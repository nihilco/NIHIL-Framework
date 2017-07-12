<?php

namespace App\Http\Controllers;

use App\Models\Reply;
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
        $replies = Reply::all();
        return view('replies.index', compact('replies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $reply);

        //
        return view('replies.create');
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
            'content' => 'required',
        ]);
        
        //
        Reply::create([
            'user_id' => auth()->id(),
            'resource_id' => request('resource_id'),
            'resource_type' => request('resource_type'),
            'content' => request('content'),           
        ]);

        return back()->with('flash', [
            'type' => 'success',
            'title' => 'Created Reply',
            'message' => 'You created a reply.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \NIHILCo\Forums\Models\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
        return view('replies.show', compact('reply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ThreadReply  $threadReply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        $this->authorize('update', $reply);
        
        //
        return view('replies.edit', compact('reply'));
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
        $this->authorize('update', $reply);
                
        //
        $this->validate($request, [
            'content' => 'required',
        ]);
        
        //

        $reply->content = request('content');
        $reply->save();

        return redirect($reply->resource->path())->with('flash', [
            'type' => 'success',
            'title' => 'Updated Reply',
            'message' => 'You updated a reply.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \NIHILCo\Forums\Models\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        $this->authorize('delete', $reply);

        $reply->delete();

        if(request()->wantsJson()) {
            return response([], 204);
        }

        return back()->with('flash', [
            'type' => 'success',
            'title' => 'Deleted Reply',
            'message' => 'You deleted a reply.',
        ]);
    }
}
