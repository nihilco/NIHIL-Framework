<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\CreatePostFormRequest;

class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
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
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
    }
    
    //
    public function index()
    {
        $posts = Post::all()->sortByDesc('published_at');
        return view('posts.index', compact('posts'));
    }

    //
    public function store(Post $post)
    {        
        Post::create([
            'title' => $post->title,
            'content' => $post->content,
            'user_id' => auth()->id(),
        ]);
        
        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('posts.create');
    }

    //
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    //
    public function blog()
    {
        $posts = Post::all();
        return view('posts.blog', compact('posts'));
    }
}
