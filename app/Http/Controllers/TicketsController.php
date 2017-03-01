<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketsController extends Controller
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
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    //
    public function store(Ticket $ticket)
    {
        Ticket::create([

        ]);

        return redirect()->route('home');
    }

    //
    public function create()
    {
        return view('tickets.create');
    }

    //
    public function show(Ticket $ticket)
    {
        return view('tickets.tickets.show', compact('ticket'));
    }
}
