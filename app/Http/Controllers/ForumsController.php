<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class ForumsController extends Controller
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
        $forums = Forum::all();
        return view('forums.index', compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('forums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);
        
        //
        $forum = new Forum();
        $forum->title = request('title');
        $forum->slug = request('slug');
        $forum->description = request('description');
        $forum->user_id = auth()->id();
        $forum->save();

        return redirect('/forums')->with('flash', [
            'type' => 'success',
            'title' => 'Created Forum',
            'message' => 'You created a forum.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        //dd($forum);
        return view('forums.show', compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \NIHILCo\Forums\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \NIHILCo\Forums\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \NIHILCo\Forums\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        //dd([auth()->id(), $forum->id, $forum->title]);
        $this->authorize('delete', $forum);

        $forum->delete();
        
        if(request()->wantsJson()) {
            return response([], 204);
        }
        
        return back()->with('flash', [
            'type' => 'success',
            'title' => 'Deleted Forum',
            'message' => 'You deleted a forum.',
        ]);    
    }
}
