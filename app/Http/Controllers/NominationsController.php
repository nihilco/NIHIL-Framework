<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class NominationsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'create', 'store']);
    }

    public function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }

    public function index()
    {
        return view('nominations.index');
    }

    public function create()
    {
        return view('nominations.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [

        ]);

        // Create new user if necessary
        if(!$user = User::byEmail(request('email'))) {
            $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
            ]);
        }
        
        // Save the form
        $issue = Issue::create([
            'creator_id' => $user->id,
            'user_id' => $user->id,
            'title' => request('subject'),
            'slug' => str_slug(request('subject') . '-' . today()->timestamp, '-'),
            'description' => request('message'),
        ]);

        // If json
        if(request()->expectsJson()) {
            //return back();
        }
        
        return redirect('/application')->with('flash', [
            'type' => 'success',
            'title' => 'Application Submitted',
            'message' => 'Application submitted.',
        ]);
    }
}
