<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\CreditCard;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\User;
use App\Models\Girl;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'about', 'mission', 'newsletters', 'partners', 'contact', 'tenth', 'downloads', 'astral', 'process', 'confirm']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index');
    }

    public function about()
    {
        return view('home.about');
    }

    public function mission()
    {
        return view('home.mission');
    }

    public function newsletters()
    {
        return view('home.newsletters');
    }

    public function partners()
    {
        return view('home.partners');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function tenth()
    {
        return view('home.tenth');
    }

    public function downloads()
    {
        return view('home.downloads');
    }

    public function astral()
    {
        $girls = Girl::find(1);
        return view('home.astral', compact('girls'));
    }

    public function confirm()
    {
        if(session('confirm') == null) {
            return redirect('/');
        }
        
        return view('home.confirm', compact(['payment', 'girls']));
    }

    public function process()
    {
        //
        if($account = Account::find(constant('NF_ACCOUNT_ID'))) {
            \Stripe\Stripe::setApiKey(\Crypt::decrypt($account->secret_key));
        }else{
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        }

        //
        $total = 0;
        $girls = array();
        
        for($i = 1; $i <= 28; $i++) {
            if(request('chk'.$i) != null) {
                $total += 25;
                $girls[] = request('chk'.$i);
            }
        }

        if($total == 0) {
            return redirect()->back();
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
            'amount' => $this->convertToCents($total),
            'metadata' => [
                'type' => 'fundraiser.astral',
                'comments' => request('comments'),
                'girls' => implode(', ', $girls),
            ],
        ]);
        
        $payment = Payment::create([
            'invoice_id' => 1,
            'customer_id' => $customer->id,
            'stripe_id' => $charge->id,
            'amount' => $charge->amount,
            'comments' => request('comments')
        ]);

        $gs = Girl::find(1);
        foreach($girls as $girl) {
            $gs->$girl = true;
        }
        $gs->save();

        session()->flash('confirm', [
            'title' => 'Thank You!',
            'message' => 'Thank you for your donation.',
            'payment' => $payment,
            'girls' => $girls
        ]);
        
        return redirect()->route('confirm');
    }

    private function convertToCents($amount)
    {
        return number_format($amount*100, 0, '.', '');
    }
}
