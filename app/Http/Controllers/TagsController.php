<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
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
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    //
    public function store(Tag $tag)
    {
        Tag::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('tags.create');
    }

    //
    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }
}
