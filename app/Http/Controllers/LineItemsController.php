<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LineItem;

class LineItemsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
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
        $lineItems = LineItem::all();
        return view('line-items.index', compact('lineItems'));
    }

    //
    public function store(LineItem $lineItem)
    {        
        LineItem::create([

        ]);
        
        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('line-items.create');
    }

    //
    public function show(LineItem $lineItem)
    {
        return view('line-items.show', compact('lineItem'));
    }
}
