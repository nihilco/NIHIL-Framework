<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvoiceItem;

class InvoiceItemsController extends Controller
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
        $invoiceItems = InvoiceItem::all();
        return view('invoice-items.index', compact('invoiceItems'));
    }

    //
    public function store(InvoiceItem $invoiceItem)
    {        
        InvoiceItem::create([

        ]);
        
        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('invoice-items.create');
    }

    //
    public function show(InvoiceItem $invoiceItem)
    {
        return view('invoice-items.show', compact('invoiceItem'));
    }
}
