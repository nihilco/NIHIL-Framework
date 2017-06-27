<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;

class TripsController extends Controller
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
        $trips = Trip::all();
        return view('trips.index', compact('trips'));
    }

    //
    public function store(Trip $trip)
    {
        Trip::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('trips.create');
    }

    //
    public function show(Trip $trip)
    {
        return view('trips.show', compact('trip'));
    }
}
