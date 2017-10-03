<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Country;

class AccountsController extends Controller
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
        //Account::editStripeAccount('acct_1AIGdvJ86jnKJ2ap');
        $accounts = Account::all();
        return view('accounts.index', compact('accounts'));
    }

    //
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'country' => 'required',
        ]);

        $stripeAccount = \Stripe::createAccount([
            'type' => 'custom',
            'country' => 'US',
            'business_name' => request('name'),
        ]);
        
        //
        $account = Account::create([
            'user_id' => auth()->id(),
            'creator_id' => auth()->id(),
            'mode' => 'test',
            'status' => 'active',
            'name' => request('name'),
            'stripe_id' => $stripeAccount->id,
            'publishable_key' => $stripeAccount->keys['publishable'],
            'secret_key' => \Crypt::encrypt($stripeAccount->keys['secret']),
            'description' => request('description'),
            'country_id' => request('country'),
            'managed' => true,           
        ]);

        if(request()->expectsJson()) {
            return $account->load('user');
        }

        return redirect('/accounts')->with('flash', [
            'type' => 'success',
            'title' => 'Created Account',
            'message' => 'You created an account.',
        ]);
    }

    //
    public function create()
    {
        $countries = Country::all();
        return view('accounts.create', compact('countries'));
    }

    //
    public function show(Account $account)
    {
        return view('accounts.show', compact('account'));
    }

    public function destroy(Account $account)
    {
        //$this->authorize('update', $account);

        $account->delete();
        
        if(request()->wantsJson()) {
            return response([], 204);
        }
        
        return back();    
    }
}
