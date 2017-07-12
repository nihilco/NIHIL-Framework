<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    //
    public function create()
    {
        return view('registration.create');
    }

    //
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'agreed' => 'required|in:on'
        ]);

        $user = User::create([
            'name' => request('name'),
            'username' => request('username'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'tos_acceptance_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        auth()->login($user);

        return redirect()->route('dashboard');
    }
    
}
