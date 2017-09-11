<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;

class FollowsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }

    public function index()
    {
        $follows = Follow::all();
        return view('follows.index', compact('follows'));
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'resource_id' => 'required',
            'resource_type' => 'required',
        ]);

        if($follow = Follow::withTrashed()->where([
            'user_id' => auth()->id(),
            'resource_id' => request('resource_id'),
            'resource_type' => request('resource_type'),
        ])->first()) {
            
            $follow->restore();
            
        } else {
        
            $follow = Follow::create([
                'creator_id' => auth()->id(),
                'user_id' => auth()->id(),
                'resource_id' => request('resource_id'),
                'resource_type' => request('resource_type'),
            ]);

        }

        if(request()->expectsJson()) {
            return $follow->load('user');
        }

        return back()->with('flash', [
            'type' => 'success',
            'title' => 'Created Follow',
            'message' => 'You created a follow.',
        ]);
    }

    public function create()
    {
        return view('follows.create');
    }

    public function show(Follow $follow)
    {
        return view('follows.show', compact('follow'));
    }

    public function destroy(Follow $follow)
    {
        $this->authorize('delete', $follow);
        
        //
        $follow->delete();

        return back()->with('flash', [
            'type' => 'success',
            'title' => 'Deleted Follow',
            'message' => 'You deleted your follow.',
        ]);;;
    }
}
