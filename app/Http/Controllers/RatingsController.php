<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingsController extends Controller
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
        $ratings = Rating::all();
        return view('ratings.index', compact('ratings'));
    }

    public function store(Rating $rating)
    {
        Rating::create([]);

        return back();
    }

    public function create()
    {
        return view('ratings.create');
    }

    public function show(Rating $rating)
    {
        return view('ratings.show', compact('rating'));
    }

    public function destroy(Rating $rating)
    {
        $rating->delete();

        return back();
    }
}
