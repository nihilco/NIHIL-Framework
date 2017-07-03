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

    public function test_a_subscription_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->subscription->user);
    }
    
}