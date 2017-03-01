<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;

class InvoicesController extends Controller
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
        $invoices = Invoice::all();
        return view('invoices.index', compact('invoices'));
    }

    //
    public function store(Invoice $invoice)
    {        
        Invoice::create([

        ]);
        
        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('invoices.create');
    }

    //
    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }
}
