<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use App\Models\CreditCard;
use App\Models\Account;
use App\Models\Customer;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Invoice;

class PaymentsController extends Controller
{
        //
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['donate', 'processDonation']]);
    }

    //
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    //
    public function store()
    {

    }

    //
    public function process()
    {
        $this->validate(request(), [
            'amount' => 'required|',
            'email' => 'required|email',
            'recurrence' => 'required|in:single,month,year'
        ]);
        
        if($account = Account::find(constant('NF_ACCOUNT_ID'))) {
            \Stripe\Stripe::setApiKey(\Crypt::decrypt($account->secret_key));
        }else{
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        }

        if(!$user = User::byEmail(request('email'))) {
            $user = User::create([
                'email' => request('email'),
            ]);
        }

        if(!$customer = Customer::byAccountAndUserIds(constant('NF_ACCOUNT_ID'),$user->id)) {
            $customer = Customer::createStripeCustomerId($user);
        }
        
        $stripeCustomer = \Stripe\Customer::retrieve($customer->stripe_id);

        $token = \Stripe\Token::retrieve(request('stripeToken'));
        
        if(count($customer->cards)) {
            foreach($customer->cards as $c) {
                if($c->fingerprint = $token->card->fingerprint) {
                    $card = $c;
                }
            }
        }else{
            $newCard = $stripeCustomer->sources->create(array("source" => request('stripeToken')));

            $card = CreditCard::create([
                'account_id' => $customer->account_id, 
                'customer_id' => $customer->id,
                'stripe_id' => $token->card->id,
                'brand' => $token->card->brand,
                'last_4' => $token->card->last4,
                'fingerprint' => $token->card->fingerprint,
                'default' => true,
                'added_at' => \Carbon\Carbon::now(),
            ]);
        }

        $cents = $this->convertToCents(request('amount'));
        
        if(request('recurrence') == 'month' || request('recurrence') == 'year') {
            
            if(!$plan = Plan::findUniquePlan($customer->account_id, $cents, 1, request('recurrence'), 1)) {

                $plan = Plan::create([
                    'account_id' => $customer->account_id,
                    'name' => 'Plan of ' . request('amount') . ' every 1 ' . request('recurrence') . '.',
                    'amount' => $cents,
                    'currency_id' => 1,
                    'interval' => request('recurrence'),
                    'interval_count' => 1,
                ]);

                $stripePlan = \Stripe\Plan::create([
                    'amount' => $plan->amount,
                    'interval' => $plan->interval,
                    'interval_count' => $plan->interval_count,
                    'name' => $plan->name,
                    'currency' => 'usd',
                    'id' => $plan->id
                ]);
            }

            $stripeSubscription = \Stripe\Subscription::create(array(
                'customer' => $customer->stripe_id,
                'plan' => $plan->id,
                'metadata' => [
                    'type' => 'donation',
                    'comments' => request('comments'),
                ], 
            ));

            $subscription = Subscription::create([
                'account_id' => $customer->account_id,
                'customer_id' => $customer->id,
                'plan_id' => $plan->id,
                'stripe_id' => $stripeSubscription->id,
                'number_of_terms' => 1,
            ]);

            session()->flash('confirm', [
                'title' => 'Thank You!',
                'message' => 'Thank you for your recurring donation.',
                'subscription' => $subscription
            ]);
            
        } else {
            
            $charge = \Stripe\Charge::create([
                'customer' => $customer->stripe_id,
                'currency' => 'usd',
                'source' => $card->stripe_id,
                'amount' => $cents,
                'metadata' => [
                    'type' => 'donation',
                    'comments' => request('comments'),
                ],
            ]);
            
            $payment = Payment::create([
                'account_id' => $customer->account_id,
                'customer_id' => $customer->id,
                'invoice_id' => 1,
                'stripe_id' => $charge->id,
                'amount' => $charge->amount,
                'comments' => request('comments')
            ]);

            session()->flash('confirm', [
                'title' => 'Thank You!',
                'message' => 'Thank you for your donation.',
                'payment' => $payment
            ]);
            
        }
        
        //return redirect()->route('home');
        return redirect()->route('confirm');
    }

    //
    public function create()
    {
        return view('payments.create');
    }

    //
    public function show(Payment $payment)
    {
        return view('payment.show', compact('payment'));
    }

    //
    public function make()
    {
        return view('payments.make');
    }

    //
    public function donate()
    {
        return view('payments.donate');
    }

    public function processDonation(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required',
            'recurrence' => 'required',
            'email' => 'required',
            'stripeToken' => 'required',
        ]);

        if(!$user = User::byEmail(request('email'))) {
            $user = User::create([
                'email' => request('email'),
            ]);
        }

        $subtotal = request('amount') * 100;

        //
        $invoice = Invoice::create([
            'creator_id' => $user->id,
            'account_id' => 1,
            'customer_id' => $user->customers()->where('account_id', 1)->first()->id,
            'type_id' => 25,
            'status_id' => 7,
            'slug' => uniqid(),
            'subtotal' => $subtotal,
            'tax_rate' => 0,
            'tax' => 0,
            'shipping_total' => 0,
            'total' => $subtotal,
        ]);

        $invoice->addItem(
            $user->id,
            'General Donation',
            'General purpose donation.',
            1,
            $subtotal
        );

        if(request('recurrence') == 'once') {
            $payment = $invoice->makePayment([
                'token' => request('stripeToken'),
                'email' => request('email'),
                'comments' => request('comments'),
            ]);
        } elseif(
            request('recurrence') == 'monthly' ||
            request('recurrence') == 'yearly'
        ) {
            $payment = $invoice->makeRecurringPayment([
                'token' => request('stripeToken'),
                'email' => request('email'),
                'recurrence' => request('recurrence'),
                'comments' => request('comments'),
            ]);
        }
        
        return redirect($invoice->path())->with('flash', [
            'type' => 'success',
            'title' => 'Made Payment',
            'message' => 'You made a payment.',
        ]);
    }

    private function convertToCents($amount)
    {
        return number_format($amount*100, 0, '.', '');
    }

    private function destroy(Payment $payment)
    {
        $payment->delete();

        return back();
    }
}
