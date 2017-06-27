<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TripGroup;

class TripGroupsController extends Controller
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
        $tripGroups = TripGroup::all();
        return view('trip-groups.index', compact('tripGroups'));
    }

    //
    public function store(TripGroup $tripGroup)
    {
        TripGroup::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('trip-groups.create');
    }

    //
    public function show(TripGroup $tripGroup)
    {
        return view('trip-groups.show', compact('tripGroup'));
    }
}
