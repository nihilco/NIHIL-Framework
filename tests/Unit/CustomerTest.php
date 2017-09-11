<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerTest extends TestCase
{
    use Databasetransactions;

    protected $customer;
    
    public function setUp()
    {
        parent::setUp();

        $this->customer = create('App\Models\Customer');
    }

    public function test_a_customer_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->customer->creator);
    }

    public function test_a_customer_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->customer->user);
    }

    public function test_a_customer_has_an_account()
    {
        $this->assertInstanceOf('App\Models\Account', $this->customer->account);
    }

    public function test_a_customer_has_invoices()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->customer->invoices);
    }

    public function test_a_customer_has_orders()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->customer->orders);
    }

    public function test_a_customer_has_payments()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->customer->payments);
    }

    public function test_a_customer_has_sources()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->customer->sources);
    }

    public function test_a_customer_has_subscriptions()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->customer->subscriptions);
    }

    public function test_a_customer_has_addresses()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->customer->addresses);
    }
    
}