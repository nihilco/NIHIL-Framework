<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
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
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    //
    public function store(Product $product)
    {
        Product::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('products.create');
    }

    //
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
