<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivitiesController extends Controller
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
        $activities = Activity::all();
        return view('activities.index', compact('activities'));
    }

    //
    public function store(Activity $activity)
    {
        Activitiy::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('activities.create');
    }

    //
    public function show(Activity $activity)
    {
        return view('activities.show', compact('activity'));
    }

    public function destroy(Activity $activity)
    {
        //$this->authorize('update', $account);

        $activity->delete();
        
        if(request()->wantsJson()) {
            return response([], 204);
        }
        
        return back();    
    }
}
