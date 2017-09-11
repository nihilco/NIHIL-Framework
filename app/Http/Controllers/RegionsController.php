<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Region;

class RegionsController extends Controller
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
        $regions = Region::all();
        return view('regions.index', compact('regions'));
    }

    public function store(Request $request)
    {
        Region::create([]);

        return back();
    }

    public function create()
    {
        $countries = Country::all();
        return view('regions.create', compact(['countries']));
    }

    public function show(Region $region)
    {
        return view('regions.show', compact('region'));
    }

    public function destroy(Region $region)
    {
        $region->delete();

        return back();
    }
}
