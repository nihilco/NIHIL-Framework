<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
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
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    //
    public function store(Order $order)
    {        
        Order::create([

        ]);
        
        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('orders.create');
    }

    //
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }
}
