<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransactionType;

class TransactionTypesController extends Controller
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
        $transactionTypes = TransactionType::all();
        return view('transaction-types.index', compact('transactionTypes'));
    }

    //
    public function store(TransactionType $transactionType)
    {
        TransactionType::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('transaction-types.create');
    }

    //
    public function show(TransactionType $transactionType)
    {
        return view('transaction-type.show', compact('transactionType'));
    }
}
