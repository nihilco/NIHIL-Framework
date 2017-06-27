<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tripper;

class TrippersController extends Controller
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
        $trippers = Tripper::all();
        return view('trippers.index', compact('trippers'));
    }

    //
    public function store(Tripper $tripper)
    {
        Tripper::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('trippers.create');
    }

    //
    public function show(Tripper $tripper)
    {
        return view('trippers.show', compact('tripper'));
    }
}
