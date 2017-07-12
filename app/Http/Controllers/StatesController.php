<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StatesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }

    public function index()
    {
        $states = State::all();
        return view('states.index', compact('states'));
    }

    public function store(State $state)
    {
        State::create([]);

        return back();
    }

    public function create()
    {
        return view('states.create');
    }

    public function show(State $state)
    {
        return view('states.show', compact('state'));
    }

    public function destroy(State $state)
    {
        $state->delete();

        return back();
    }
}
