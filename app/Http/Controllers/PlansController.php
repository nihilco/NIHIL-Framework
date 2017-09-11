<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Currency;
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
    public function store(Request $request)
    {
                //
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'currency' => 'required',
            'intervalCount' => 'required',
            'interval' => 'required',
        ]);
        
        //
        $plan = Plan::create([
            'account_id' => 1,
            'name' => request('name'),
            'slug' => request('slug'),
            'description' => request('description'),
            'user_id' => auth()->id(),
            'amount' => request('amount'),
            'currency_id' => request('currency'),
            'interval_count' => request('intervalCount'),
            'interval' => request('interval'),
        ]);

        return redirect('/plans')->with('flash', [
            'type' => 'success',
            'title' => 'Created Plan',
            'message' => 'You created a plan.',
        ]);
    }

    //
    public function create()
    {
        $accounts = Account::all();
        $currencies = Currency::all();

        return view('plans.create', compact('accounts', 'currencies'));
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
