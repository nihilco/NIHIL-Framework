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

    public function test_a_customer_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->customer->user);
    }

    public function test_a_customer_has_an_account()
    {
        $this->assertInstanceOf('App\Models\Account', $this->customer->account);
    }
    
}