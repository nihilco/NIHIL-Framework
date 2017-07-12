<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }

    //
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    //
    public function create()
    {
        return view('customers.create');
    }

    //
    public function store()
    {

    }

    //
    public function destroy()
    {

    }
}
