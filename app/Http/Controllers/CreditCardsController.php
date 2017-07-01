<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreditCard;

class CreditCardsController extends Controller
{    //
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
        $cretidCards = CreditCard::all();
        return view('credit-cards.index', compact('creditCards'));
    }

    //
    public function store(CreditCard $creditCard)
    {        
        CreditCard::create([

        ]);
        
        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('credit-cards.create');
    }

    //
    public function show(CreditCard $creditCard)
    {
        return view('credit-cards.show', compact('creditCard'));
    }
}
