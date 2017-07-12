<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoritesController extends Controller
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
        $favorites = Favorite::all();
        return view('favorites.index', compact('favorites'));
    }

    public function store(Favorite $favorite)
    {
        Favorite::create([]);

        return back();
    }

    public function create()
    {
        return view('favorites.create');
    }

    public function show(Favorite $favorite)
    {
        return view('favorites.show', compact('favorite'));
    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();

        return back();
    }
}
