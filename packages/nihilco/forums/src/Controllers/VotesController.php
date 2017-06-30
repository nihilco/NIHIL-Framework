<?php

namespace NIHILCo\Forums\Controllers;

use NIHILCo\Forums\Models\Vote;
use NIHILCo\Forums\Models\Forum;
use NIHILCo\Forums\Models\Thread;
use NIHILCo\Forums\Models\Reply;
use App\Http\Controllers\Controller;
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \NIHILCo\Forums\Models\Thread  $thread
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Forum $forum, Thread $thread, Reply $reply = null, Request $request)
    {
        //
        $this->validate($request, [
            'vote' => 'required',
        ]);
        
        //
        if(isset($reply) && $reply->id > 0) {
            $reply->castVote(request('vote'));
        } elseif(isset($thread) && $thread->id > 0) {
            $thread->castVote(request('vote'));
        }

        return back();
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
    }
}
