<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrderTest extends TestCase
{
    use Databasetransactions;

    protected $order;
    
    public function setUp()
    {
        parent::setUp();

        $this->order = create('App\Models\Order');
    }

    public function test_an_order_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->order->user);
    }

    public function test_an_order_has_an_account()
    {
        $this->assertInstanceOf('App\Models\Account', $this->order->account);
    }

    public function test_an_order_has_a_customer()
    {
        $this->assertInstanceOf('App\Models\Customer', $this->order->customer);
    }
    
}