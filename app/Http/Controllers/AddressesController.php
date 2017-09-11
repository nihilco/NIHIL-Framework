<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressesController extends Controller
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

    public function index()
    {
        $addresses = Address::all();
        return view('addresses.index', compact('addresses'));
    }

    public function store(Address $address)
    {
        Address::create([]);

        return back();
    }

    public function create()
    {
        return view('addresses.create');
    }

    public function show(Address $address)
    {
        return view('addresses.show', compact('address'));
    }

    public function destroy(Address $address)
    {
        $address->delete();

        return back();
    }
}
