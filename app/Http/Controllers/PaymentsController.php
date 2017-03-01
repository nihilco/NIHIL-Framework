<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class PaymentsController extends Controller
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
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    //
    public function store(Payment $payment)
    {
        Payment::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('payments.create');
    }

    //
    public function show(Payment $payment)
    {
        return view('payment.show', compact('payment'));
    }
}
