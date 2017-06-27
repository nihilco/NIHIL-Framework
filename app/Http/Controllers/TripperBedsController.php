<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\Tripper;

class TripperBedsController extends Controller
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
        $trip = Trip::find(1);
        $trippers = Tripper::where('trip_id', $trip->id)->orderBy('last_name', 'asc')->get();
        return view('tripper-beds.index', compact('trip', 'trippers'));
    }

    //
    public function store(TripperBed $tripperBed)
    {
        TripperBeds::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('tripper-beds.create');
    }

    //
    public function show(TripperBed $tripperBed)
    {
        return view('tripper-beds.show', compact('tripperBed'));
    }
}
