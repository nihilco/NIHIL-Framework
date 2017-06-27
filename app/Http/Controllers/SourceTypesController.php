<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SourceType;

class SourceTypesController extends Controller
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
        $sourceTypes = SourceType::all();
        return view('source-types.index', compact('sourceTypes'));
    }

    //
    public function store(SourceType $sourceType)
    {
        SourceType::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('source-types.create');
    }

    //
    public function show(SourceType $sourceType)
    {
        return view('source-types.show', compact('sourceType'));
    }
}
