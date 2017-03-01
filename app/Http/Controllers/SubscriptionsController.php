<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscription;

class SubscriptionsController extends Controller
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
        $subscriptions = Subscription::all();
        return view('subscriptions.index', compact('subscriptions'));
    }

    //
    public function store(Subscription $subscription)
    {
        Subscription::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('subscription.create');
    }

    //
    public function show(Subscription $subscription)
    {
        return view('subscriptions.show', compact('subscription'));
    }
}
