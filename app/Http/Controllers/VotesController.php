<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;

class VotesController extends Controller
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
        $votes = Vote::all();
        return view('votes.index', compact('voates'));
    }

    //
    public function store(Vote $vote)
    {
        Vote::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('votes.create');
    }

    //
    public function show(Vote $vote)
    {
        return view('votes.show', compact('vote'));
    }
}
