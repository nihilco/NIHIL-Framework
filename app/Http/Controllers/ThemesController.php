<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;

class ThemesController extends Controller
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
        $themes = Theme::all();
        return view('themes.index', compact('themes'));
    }

    public function store(Theme $theme)
    {
        Theme::create([]);

        return back();
    }

    public function create()
    {
        return view('themes.create');
    }

    public function show(Theme $theme)
    {
        return view('themes.show', compact('theme'));
    }

    public function destroy(Theme $theme)
    {
        $theme->delete();

        return back();
    }
}
