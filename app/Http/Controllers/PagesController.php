<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PagesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
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
        $pages = Page::all();
        return view('pages.index', compact('pages'));
    }

    //
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);
        
        $page = Page::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'slug' => request('slug'),
            'description' => request('description'),
            'content' => request('content'),
        ]);

        if(request()->expectsJson()) {
            return $page->load('user');
        }

        return redirect('/pages')->with('flash', [
            'type' => 'success',
            'title' => 'Created Page',
            'message' => 'You created a page.',
        ]);
    }

    //
    public function create()
    {
        return view('pages.create');
    }

    //
    public function show(Page $page)
    {
        return view('pages.show', compact('page'));
    }
}
