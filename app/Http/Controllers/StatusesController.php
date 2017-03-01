<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

class StatusesController extends Controller
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
        return view('statuses.index', compact('statuses'));
    }

    //
    public function store(Status $status)
    {
        Status::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('statuses.create');
    }

    //
    public function show(Status $status)
    {
        return view('statuses.show', compact('status'));
    }
}
