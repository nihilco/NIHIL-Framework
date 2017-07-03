<?php

namespace Tests\Feature;

use Tests\TestCase;

class CustomersControllerTest extends TestCase
{
    protected $customer;
    
    public function setUp()
    {
        parent::setUp();

        $this->customer = create('App\Models\Customer');
    }

}