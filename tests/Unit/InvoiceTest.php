<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvoiceTest extends TestCase
{
    use Databasetransactions;

    protected $invoice;
    
    public function setUp()
    {
        parent::setUp();

        $this->invoice = create('App\Models\Invoice');
    }

    public function test_an_invoice_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->invoice->user);
    }
    
}