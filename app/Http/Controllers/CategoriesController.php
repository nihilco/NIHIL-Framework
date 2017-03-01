<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
        //
    public function __construct()
    {
        $this->middleware('auth');
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
        return view('cateogries.index', compact('categories'));
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
}
