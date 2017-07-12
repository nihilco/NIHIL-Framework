<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exception;

class ExceptionsController extends Controller
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
        $exceptions = Exception::all();
        return view('exceptions.index', compact('exceptions'));
    }

    public function store(Exception $exception)
    {
        Exception::create([]);

        return back();
    }

    public function create()
    {
        return view('exceptions.create');
    }

    public function show(Exception $exception)
    {
        return view('exceptions.show', compact('exception'));
    }

    public function destroy(Exception $exception)
    {
        $exception->delete();

        return back();
    }
}
