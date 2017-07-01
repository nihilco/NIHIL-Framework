<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PagesController extends Controller
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
        $pages = Page::all();
        return view('pages.index', compact('pages'));
    }

    //
    public function store(Page $page)
    {
        Page::create([

        ]);

        return redirect()->route('home');
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
