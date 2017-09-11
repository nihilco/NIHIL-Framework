<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoicesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'pay']);
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
    public function pay(Invoice $invoice, Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'stripeToken' => 'required',
        ]);
        
        $payment = $invoice->makePayment([
            'token' => request('stripeToken'),
            'email' => request('email'),
            'comments' => request('comments'),
        ]);

        return redirect($invoice->path())->with('flash', [
            'type' => 'success',
            'title' => 'Made Payment',
            'message' => 'You made a payment.',
        ]);
    }

    //
    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return back();
    }
}
