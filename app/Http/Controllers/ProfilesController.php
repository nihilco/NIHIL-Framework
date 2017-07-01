<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return $user->activity()->with('subject')->get();
        
        return view('profiles.show', [
            'profileUser' => $user,
            'threads' => $user->threads()->paginate(10),
        ]);
    }
}