<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\User;
use App\CreditCard;
use App\Account;
use App\Customer;

class PaymentsController extends Controller
{
        //
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['donate', 'process']]);
    }

    //
    public function validator(array $data)
    {
        return Validator::make($data, [

        ]);
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
                'customer_id' => $customer->id,
                'stripe_id' => $token->card->id,
                'brand' => $token->card->brand,
                'last_4' => $token->card->last4,
                'fingerprint' => $token->card->fingerprint,
                'default' => true,
                'added_at' => \Carbon\Carbon::now(),
            ]);
        }

        $charge = \Stripe\Charge::create([
            'customer' => $customer->stripe_id,
            'currency' => 'usd',
            'source' => $card->stripe_id,
            'amount' => $this->convertToCents(request('amount')),
            'metadata' => [
                'type' => 'donation',
                'comments' => request('comments'),
            ],
        ]);
        
        $payment = Payment::create([
            'invoice_id' => 1,
            'customer_id' => $customer->id,
            'stripe_id' => $charge->id,
            'amount' => $charge->amount,
            'comments' => request('comments')
        ]);

        session()->flash('confirm', [
            'title' => 'Thank You!',
            'message' => 'Thank you for your donation.',
            'payment' => $payment
        ]);
        
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

    private function convertToCents($amount)
    {
        return number_format($amount*100, 0, '.', '');
    }
}
