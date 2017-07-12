<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resolution;

class ResolutionsController extends Controller
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
        $resolutions = Resolution::all();
        return view('resolutions.index', compact('resolutions'));
    }

    //
    public function store(Resolutions $resolution)
    {
        Resolution::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('resolutions.create');
    }

    //
    public function show(Resolution $resolution)
    {
        return view('resolutions.show', compact('resolution'));
    }

    public function destroy(Resolution $resolution)
    {
        $resolution->delete();
        
        return back();
    }
}
