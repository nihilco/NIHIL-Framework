<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\User;
use App\CreditCard;

class PaymentsController extends Controller
{
        //
    public function __construct()
    {
        $this->middleware('auth');
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
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        if(!$user = User::byEmail(request('email'))) {
            $user = User::create([
                'email' => request('email'),
            ]);
        }

        if(!$user->stripe_id){
            $user->createStripeCustomerId();
        }
        $customer = \Stripe\Customer::retrieve($user->stripe_id);

        $token = \Stripe\Token::retrieve(request('stripeToken'));

        if(count($user->cards)) {
            foreach($user->cards as $c) {
                if($c->fingerprint = $token->card->fingerprint) {
                    $card = $c;
                }
            }
        }else{
            $newCard = $customer->sources->create(array("source" => request('stripeToken')));

            $card = CreditCard::create([
                'user_id' => $user->id,
                'card_id' => $token->card->id,
                'brand' => $token->card->brand,
                'last_4' => $token->card->last4,
                'fingerprint' => $token->card->fingerprint,
                'default' => true,
                'added_at' => \Carbon\Carbon::now(),
            ]);
        }

        $charge = \Stripe\Charge::create([
            'customer' => $user->stripe_id,
            'currency' => 'usd',
            'source' => $card->card_id,
            'amount' => $this->convertToCents(request('amount')),
            'metadata' => [
                'comments' => request('comments'),
            ],
        ]);
        
        Payment::create([
            'invoice_id' => 1,
            'user_id' => $user->id,
            'charge_id' => $charge->id,
            'amount' => $charge->amount,
            'comments' => request('comments')
        ]);

        return redirect()->route('home');
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
