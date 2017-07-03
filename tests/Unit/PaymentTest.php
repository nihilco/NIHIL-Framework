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

    public function test_a_payment_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->payment->user);
    }
    
}