<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PaymentTest extends TestCase
{
    use Databasetransactions;

    protected $payment;
    
    public function setUp()
    {
        parent::setUp();

        $this->payment = create('App\Models\Payment');
    }

    public function test_a_payment_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->payment->creator);
    }

    public function test_a_payment_has_an_account()
    {
        $this->assertInstanceOf('App\Models\Account', $this->payment->account);
    }

    public function test_a_payment_has_a_customer()
    {
        $this->assertInstanceOf('App\Models\Customer', $this->payment->customer);
    }
    
    public function test_a_payment_has_an_invoice()
    {
        $this->assertInstanceOf('App\Models\Invoice', $this->payment->invoice);
    }

    public function test_a_payment_has_an_type()
    {
        $this->assertInstanceOf('App\Models\Type', $this->payment->type);
    }
    
}