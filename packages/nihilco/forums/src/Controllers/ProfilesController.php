<?php

namespace NIHILCo\Forums\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return $user->activity()->with('subject')->get();
        
        return view('forums::profiles.show', [
            'profileUser' => $user,
            'threads' => $user->threads()->paginate(10),
        ]);
    }
}