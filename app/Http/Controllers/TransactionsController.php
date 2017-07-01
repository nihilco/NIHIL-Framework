<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionsController extends Controller
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
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    //
    public function store(Transaction $transaction)
    {
        Transaction::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('transactions.create');
    }

    //
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }
}
