<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

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
        $accounts = Account::all();
        return view('accounts.index', compact('accounts'));
    }

    //
    public function store(Account $account)
    {
        Account::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('accounts.create');
    }

    //
    public function show(Account $account)
    {
        return view('accounts.show', compact('account'));
    }
}
