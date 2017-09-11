<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Forum;
use App\Filters\ThreadFilters;
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

        return view('threads.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Forum $forum)
    {
        //
        return view('threads.create', compact(['forum']));
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

        return redirect($forum->path())->with('flash', [
            'type' => 'success',
            'title' => 'Created Thread',
            'message' => 'You created a thread.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \NIHILCo\Forums\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum, Thread $thread)
    {
        return view('threads.show', [
            'forum' => $forum,
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
    public function edit(Forum $forum, Thread $thread)
    {
        //
        $this->authorize('update', $thread);

        return view('threads.edit', compact('forum', 'thread'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Forum $forum, Thread $thread, Request $request)
    {
        $this->authorize('update', $thread);

        if(request('cancel') == 'true') {
            return redirect($forum->path());
        }
        
        //
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
        ]);
        
        //
        $thread->title = request('title');
        $thread->slug = request('slug');
        $thread->body = request('body');
        $thread->save();

        return redirect($forum->path())->with('flash', [
            'type' => 'success',
            'title' => 'Updated Thread',
            'message' => 'You updated a thread.',
        ]);
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

        return back()->with('flash', [
            'type' => 'success',
            'title' => 'Deleted Thread',
            'message' => 'You deleted a thread.',
        ]);
    }

    public function getThreads($filters)
    {
        return Thread::latest()->filter($filters)->get();
    }
}
