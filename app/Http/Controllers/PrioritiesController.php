<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Priority;

class PrioritiesController extends Controller
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
        $priorities = Priority::all();
        return view('priorities.index', compact('priorities'));
    }

    //
    public function store(Priority $priority)
    {
        Priority::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('priorities.create');
    }

    //
    public function show(Priority $priority)
    {
        return view('priorities.show', compact('priority'));
    }

    public function destroy(Priority $priority)
    {
        $priority->delete();

        return back();
    }
}
