<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountriesController extends Controller
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
        $countries = Country::all();
        return view('countries.index', compact('countries'));
    }

    public function store(Country $country)
    {
        Country::create([]);

        return back();
    }

    public function create()
    {
        return view('countries.create');
    }

    public function show(Country $country)
    {
        return view('countries.show', compact('country'));
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return back();
    }
}
