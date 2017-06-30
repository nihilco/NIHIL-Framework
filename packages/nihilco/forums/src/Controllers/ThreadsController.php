<?php

namespace NIHILCo\Forums\Controllers;

use NIHILCo\Forums\Models\Thread;
use NIHILCo\Forums\Models\Forum;
use App\Http\Controllers\Controller;
use NIHILCo\Forums\Filters\ThreadFilters;
use Illuminate\Http\Request;

class ThreadsController extends Controller
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
    public function index(ThreadFilters $filters)
    {
        $threads = $this->getThreads($filters);

        if(request()->wantsJson()) {
            return $threads;
        }

        return view('forums::threads.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Forum $forum)
    {
        //
        return view('forums::threads.create', compact(['forum']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Forum $forum, Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
        ]);
        
        //
        $forum->addThread([
            'title' => request('title'),
            'slug' => request('slug'),
            'body' => request('body'),
            'user_id' => auth()->id(),
        ]);

        return redirect($forum->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \NIHILCo\Forums\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum, Thread $thread)
    {
        return view('forums::threads.show', [
            'thread' => $thread,
            'replies' => $thread->replies()->paginate(10),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \NIHILCo\Forums\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \NIHILCo\Forums\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \NIHILCo\Forums\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum, Thread $thread)
    {
        $this->authorize('update', $thread);
        
        $thread->delete();

        if(request()->wantsJson()) {
            return response([], 204);
        }

        return back();
    }

    public function getThreads($filters)
    {
        return Thread::latest()->filter($filters)->get();
    }
}
