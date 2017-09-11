<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }

    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function store(Author $author)
    {
        Author::create([]);

        return back();
    }

    public function create()
    {
        return view('authors.create');
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return back();
    }
}
