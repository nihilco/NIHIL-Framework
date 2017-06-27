<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TripperMeal;

class TripperMealsController extends Controller
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
        $statuses = Status::all();
        return view('tripper-meals.index', compact('TripperMeals'));
    }

    //
    public function store(TripperMeal $tripperMeal)
    {
        TripperMeal::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('tripper-meals.create');
    }

    //
    public function show(tripperMeal $tripperMeal)
    {
        return view('tripperMeals.show', compact('tripperMeal'));
    }
}
