<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edition;

class EditionsController extends Controller
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
        $editions = Edition::all();
        return view('editions.index', compact('editions'));
    }

    public function store(Request $request)
    {
        Edition::create([]);

        return back();
    }

    public function create()
    {
        return view('editions.create');
    }

    public function show(Edition $edition)
    {
        return view('editions.show', compact('edition'));
    }

    public function destroy(Edition $edition)
    {
        $edition->delete();

        return back();
    }
}
