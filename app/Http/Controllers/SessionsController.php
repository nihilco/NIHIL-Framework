<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Session;

class SessionsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function index()
    {
        $sessions = Session::all();
        return view('sessions.index', compact('sessions'));
    }
    
    //
    public function create()
    {
        return view('sessions.create');
    }

    //
    public function store()
    {   
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(request(['email', 'password']))) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Wrong username/password combination', 'password' => 'Wrong username/password combination']);

    }

    //
    public function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }
}
