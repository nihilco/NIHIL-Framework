<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Invoice;
use App\Models\User;

class TicketsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['buy']);
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
    public function buy(Request $request)
    {
        $this->validate($request, [
            'quantity' => 'required',
            'email' => 'required',
            'stripeToken' => 'required',
        ]);

        if(!$user = User::byEmail(request('email'))) {
            $user = User::create([
                'email' => request('email'),
            ]);
        }

        $ticketPrice = 3500;
        $subtotal = request('quantity') * $ticketPrice;

        //
        $invoice = Invoice::create([
            'creator_id' => $user->id,
            'account_id' => 1,
            'customer_id' => $user->customers()->where('account_id', 1)->first()->id,
            'type_id' => 24,
            'status_id' => 7,
            'slug' => uniqid(),
            'subtotal' => $subtotal,
            'tax_rate' => 0,
            'tax' => 0,
            'shipping_total' => 0,
            'total' => $subtotal,
        ]);

        $invoice->addItem(
            $user->id,
            'Tenth Anniversary Celebration Tickets',
            'Tenth Anniversary Celebration Tickets',
            request('quantity'),
            $ticketPrice
        );
        
        $payment = $invoice->makePayment([
            'token' => request('stripeToken'),
            'email' => request('email'),
            'comments' => request('comments'),
        ]);

        for($i = 1; $i <= request('quantity'); $i++) {
            $ticket = Ticket::create([
                'creator_id' => $user->id,
                'user_id' => $user->id, 
                'slug' => uniqid(),
                'price' => $ticketPrice
            ]);
        }

        return redirect($invoice->path())->with('flash', [
            'type' => 'success',
            'title' => 'Made Payment',
            'message' => 'You made a payment.',
        ]);
    }

    //
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return back();
    }
}
