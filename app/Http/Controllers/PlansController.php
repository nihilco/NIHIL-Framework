<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class PlansController extends Controller
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
        $plans = Plan::all();
        return view('plans.index', compact('plans'));
    }

    //
    public function store(Plan $plan)
    {
        Plan::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('plans.create');
    }

    //
    public function show(Plan $plan)
    {
        return view('plans.show', compact('plan'));
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        return back();
    }
}
