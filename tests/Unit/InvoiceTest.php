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

    public function test_an_invoice_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->invoice->creator);
    }

    public function test_an_invoice_has_aa_account()
    {
        $this->assertInstanceOf('App\Models\Account', $this->invoice->account);
    }

    public function test_an_invoice_has_a_customer()
    {
        $this->assertInstanceOf('App\Models\Customer', $this->invoice->customer);
    }

    public function test_an_invoice_has_a_type()
    {
        $this->assertInstanceOf('App\Models\Type', $this->invoice->type);
    }

    public function test_an_invoice_has_a_status()
    {
        $this->assertInstanceOf('App\Models\Status', $this->invoice->status);
    }

    public function test_an_invoice_has_a_biiling_address()
    {
        $this->assertInstanceOf('App\Models\Address', $this->invoice->billingAddress);
    }

    public function test_an_invoice_has_a_shipping_address()
    {
        $this->assertInstanceOf('App\Models\Address', $this->invoice->shippingAddress);
    }

    public function test_an_invoice_has_items()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->invoice->items);
    }
    
}