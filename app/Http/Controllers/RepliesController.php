<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\Forum;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
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
    public function create(Forum $forum, Thread $thread)
    {
        //
        return view('replies.create', compact(['forum', 'thread']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \NIHILCo\Forums\Models\Thread  $thread
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Forum $forum, Thread $thread, Request $request)
    {
        //
        $this->validate($request, [
            'body' => 'required',
        ]);
        
        //
        $thread->addReply([
            'body' => request('body'),
            'user_id' => auth()->id(),
        ]);

        return redirect($thread->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \NIHILCo\Forums\Models\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum, Thread $thread, Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ThreadReply  $threadReply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \NIHILCo\Forums\Models\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \NIHILCo\Forums\Models\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum, Thread $thread, Reply $reply)
    {
        $this->authorize('update', $reply);

        $reply->delete();

        if(request()->wantsJson()) {
            return response([], 204);
        }

        return back();
    }
}
