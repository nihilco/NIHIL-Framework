<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Invoice;
use App\Models\Payment;

class InvoicePaid extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;
    public $payment;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invoice $invoice, Payment $payment)
    {
        //
        $this->invoice = $invoice;
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.invoices.paid.html')
                    ->text('emails.invoices.paid.text');
    }
}
