<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Invoice;
use App\Models\Payment;
use App\Mail\InvoicePaid;

class SendInvoicePaidEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    
    public $invoice;
    public $payment;
    
    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        
    }
}
