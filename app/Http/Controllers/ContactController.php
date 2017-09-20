<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\User;

class ContactController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'store']);
    }

    public function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }

    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Create new user if necessary
        if(!$user = User::byEmail(request('email'))) {
            $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
            ]);
        }
        
        // Save the form as a ticket
        $issue = Issue::create([
            'creator_id' => $user->id,
            'user_id' => $user->id,
            'title' => request('subject'),
            'slug' => str_slug(request('subject') . '-' . today()->timestamp, '-'),
            'description' => request('message'),
        ]);

        // Email
        
        
        // If json
        if(request()->expectsJson()) {
            //return back();
        }
        
        return redirect('/contact')->with('flash', [
            'type' => 'success',
            'title' => 'Message Sent',
            'message' => 'Message successfully sent.',
        ]);
    }
}
