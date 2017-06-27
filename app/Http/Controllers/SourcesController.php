<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Source;

class SourcesController extends Controller
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
        $sources = Source::all();
        return view('sources.index', compact('sources'));
    }

    //
    public function store(Source $source)
    {
        Source::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('sources.create');
    }

    //
    public function show(Source $source)
    {
        return view('sources.show', compact('source'));
    }
}
