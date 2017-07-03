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
    
}