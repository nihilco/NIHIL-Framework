<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TripperType;

class TripperTypesController extends Controller
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
        $tripperTypes = TripperType::all();
        return view('tripper-types.index', compact('tripperTypes'));
    }

    //
    public function store(TripperType $tripperType)
    {
        TripperType::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('tripper-types.create');
    }

    //
    public function show(TripperType $tripperType)
    {
        return view('tripper-types.show', compact('tripperType'));
    }
}
