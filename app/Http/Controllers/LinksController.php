<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class LinksController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }

    public function index()
    {
        $links = Link::all();
        return view('links.index', compact('links'));
    }

    public function store(Link $link)
    {
        Link::create([]);

        return back();
    }

    public function create()
    {
        return view('links.create');
    }

    public function show(Link $link)
    {
        return view('links.show', compact('link'));
    }

    public function destroy(Link $link)
    {
        $link->delete();

        return back();
    }
}
