<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //
    public function index()
    {
        $paymentsTotal = Payment::totalOverPeriod('day');
        
        return view('admin.index', compact('paymentsTotal'));
    }
}
