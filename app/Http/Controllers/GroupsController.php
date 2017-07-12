<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupsController extends Controller
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
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    public function store(Group $group)
    {
        Group::create([]);

        return back();
    }

    public function create()
    {
        return view('groups.create');
    }

    public function show(Group $group)
    {
        return view('groups.show', compact('group'));
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return back();
    }
}
