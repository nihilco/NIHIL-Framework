<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Activity;

class UsersController extends Controller
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
        $users = User::all();
        return view('users.index', compact('users'));
    }

    //
    public function store(User $user)
    {
        User::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('users.create');
    }

    //
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user,
            'activities' => Activity::feed($user),
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }

}
