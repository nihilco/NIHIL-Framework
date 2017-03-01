<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;

class RepliesController extends Controller
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
        $replies = Reply::all();
        return view('replies.index', compact('replies'));
    }

    //
    public function store(Reply $reply)
    {
        Reply::create([

        ]);

        return redirect(0->route('home');
    }

    //
    public function create()
    {
        return view('replies.create');
    }

    //
    public function show(Reply $reply)
    {
        return view('replies.show', compact('reply'));
    }
}
