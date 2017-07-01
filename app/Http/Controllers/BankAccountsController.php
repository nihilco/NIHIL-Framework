<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankAccount;

class BankAccountsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }
    
    //
    public function index()
    {
        $bankAccounts = BankAccount::all();
        return view('bank-accounts.index', compact('bankAccounts'));
    }

    //
    public function store(BankAccount $bankAccount)
    {        
        BankAccount::create([

        ]);
        
        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('bank-accounts.create');
    }

    //
    public function show(BankAccount $bankAccount)
    {
        return view('bank-accounts.show', compact('bankAccount'));
    }
}
