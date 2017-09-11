<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubscriptionTest extends TestCase
{
    use Databasetransactions;

    protected $subscription;
    
    public function setUp()
    {
        parent::setUp();

        $this->subscription = create('App\Models\Subscription');
    }

    public function test_a_subscription_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->subscription->creator);
    }

    public function test_a_subscription_has_an_account()
    {
        $this->assertInstanceOf('App\Models\Account', $this->subscription->account);
    }

    public function test_a_subscription_has_a_customer()
    {
        $this->assertInstanceOf('App\Models\Customer', $this->subscription->customer);
    }

    public function test_a_subscription_has_a_plan()
    {
        $this->assertInstanceOf('App\Models\Plan', $this->subscription->plan);
    }
    
}