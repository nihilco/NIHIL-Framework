<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
        //
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    //
    public function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }

    //
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    //
    public function store(Category $category)
    {
        Category::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('categories.create');
    }

    //
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        
        return back();
    }
}
