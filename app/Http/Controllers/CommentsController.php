<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }

    //
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    //
    public function store(Comment $comment)
    {
        Comment::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('comments.create');
    }

    //
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }
}
