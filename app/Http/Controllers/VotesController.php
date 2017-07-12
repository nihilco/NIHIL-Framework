<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $votes = Vote::all();
        return view('votes.index', compact('votes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('votes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \NIHILCo\Forums\Models\Thread  $thread
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'resource_id' => 'required',
            'resource_type' => 'required',
            'vote' => 'required',
        ]);

        //
        Vote::create([
            'user_id' => auth()->id(),
            'resource_id' => request('resource_id'),
            'resource_type' => request('resource_type'),
            'vote' => request('vote'),
        ]);
        
        return back()->with('flash', [
            'type' => 'success',
            'title' => 'You Voted',
            'message' => 'You voted.',
        ]);;
    }

    /**
     * Display the specified resource.
     *
     * @param  \NIHILCo\Forums\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        //
        return view('votes.show', compact('vote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \NIHILCo\Forums\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \NIHILCo\Forums\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vote $vote)
    {
        //
        $this->validate($request, [
            'vote' => 'required',
        ]);

        $vote->vote = request('vote');
        $vote->save();
        
        return back()->with('flash', [
            'type' => 'success',
            'title' => 'Updated Voted',
            'message' => 'You changed your vote.',
        ]);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \NIHILCo\Forums\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        //
        $vote->delete();

        return back();
    }
}
