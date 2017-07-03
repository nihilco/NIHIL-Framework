<?php

namespace Tests\Feature;

use Tests\TestCase;

class OrdersControllerTest extends TestCase
{
    protected $order;
    
    public function setUp()
    {
        parent::setUp();

        $this->order = create('App\Models\Order');
    }

}