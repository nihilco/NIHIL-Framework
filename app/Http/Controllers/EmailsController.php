<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;

class EmailsController extends Controller
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
        $emails = Email::all();
        return view('emails.index', compact('emails'));
    }

    public function store(Email $email)
    {
        Email::create([]);

        return back();
    }

    public function create()
    {
        return view('emails.create');
    }

    public function show(Email $email)
    {
        return view('emails.show', compact('email'));
    }

    public function destroy(Email $email)
    {
        $email->delete();

        return back();
    }
}
