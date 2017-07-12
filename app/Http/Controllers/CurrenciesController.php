<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class CurrenciesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }

    public function index()
    {
        $currencies = Currency::all();
        return view('currencies.index', compact('currencies'));
    }

    public function store(Currency $currency)
    {
        Currency::create([]);

        return back();
    }

    public function create()
    {
        return view('currencies.create');
    }

    public function show(Currency $currency)
    {
        return view('currencies.show', compact('currency'));
    }

    public function destroy(Currency $currency)
    {
        $currency->delete();

        return back();
    }    
}
