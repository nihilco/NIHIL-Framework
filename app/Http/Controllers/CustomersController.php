<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Customer;
use App\Models\User;

class CustomersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }

    //
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    //
    public function create()
    {
        $users = User::all();
        $accounts = Account::all();
        return view('customers.create', compact('users', 'accounts'));
    }

    //
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'stripeId' => 'required',
            'account' => 'required',
            'user' => 'required',
            'description' => 'required',
        ]);
        
        //
        $customer = Customer::create([
            'stripe_id' => request('stripeId'),
            'account_id' => request('account'),
            'user_id' => request('user'),
            'description' => request('description'),
        ]);

        return redirect('/customers')->with('flash', [
            'type' => 'success',
            'title' => 'Created Customer',
            'message' => 'You created a customer.',
        ]);
    }

    //
    public function destroy()
    {

    }
}
