<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvoiceItemTest extends TestCase
{
    use Databasetransactions;

    protected $invoiceItem;
    
    public function setUp()
    {
        parent::setUp();

        $this->invoiceItem = create('App\Models\InvoiceItem');
    }

    public function test_an_invoice_item_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->invoiceItem->creator);
    }

    public function test_an_invoice_item_has_an_invoice()
    {
        $this->assertInstanceOf('App\Models\Invoice', $this->invoiceItem->invoice);
    }
  
}