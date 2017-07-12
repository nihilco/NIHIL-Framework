<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;

class IssuesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
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
        $issues = Issue::all();
        return view('issues.index', compact('issues'));
    }

    //
    public function store(Issue $issue)
    {
        Issue::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('issues.create');
    }

    //
    public function show(Issue $issue)
    {
        return view('issues.show', compact('issue'));
    }
}
