<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
     
        ]);
    }

    //
    public function index()
    {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    //
    public function store(Type $type)
    {
        Type::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('types.create');
    }

    //
    public function show(Type $type)
    {
        return view('types.show', compact('type'));
    }

    public function destroy(Type $type)
    {
        $type->delete();

        return back();
    }
}
