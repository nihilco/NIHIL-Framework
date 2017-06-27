<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TripActivity;

class TripActivitiesController extends Controller
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
        $tripActivities = TripActivity::all();
        return view('trip-activities.index', compact('tripActivities'));
    }

    //
    public function store(TripActivity $tripActivity)
    {
        TripActivity::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('trip-activities.create');
    }

    //
    public function show(TripActivity $tripActivity)
    {
        return view('trip-activities.show', compact('tripActivity'));
    }
}
