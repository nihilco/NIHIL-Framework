<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoritesController extends Controller
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
        $favorites = Favorite::all();
        return view('favorites.index', compact('favorites'));
    }

    public function store(Request $request)
    {
                //
        $this->validate($request, [
            'resource_id' => 'required',
            'resource_type' => 'required',
        ]);

        if($favorite = Favorite::withTrashed()->where([
            'user_id' => auth()->id(),
            'resource_id' => request('resource_id'),
            'resource_type' => request('resource_type'),
        ])->first()) {

            $favorite->restore();
            
        } else {
        
            $favorite = Favorite::create([
                'user_id' => auth()->id(),
                'resource_id' => request('resource_id'),
                'resource_type' => request('resource_type'),
            ]);

        }
        
        if(request()->expectsJson()) {
            return $favorite->load('user');
        }

        return back()->with('flash', [
            'type' => 'success',
            'title' => 'Created Favorite',
            'message' => 'You created a favorite.',
        ]);
    }

    public function create()
    {
        return view('favorites.create');
    }

    public function show(Favorite $favorite)
    {
        return view('favorites.show', compact('favorite'));
    }

    public function destroy(Favorite $favorite)
    {
        $this->authorize('delete', $favorite);
        
        //
        $favorite->delete();

        return back()->with('flash', [
            'type' => 'success',
            'title' => 'Deleted Favorite',
            'message' => 'You deleted your favorite.',
        ]);;;
    }
}
