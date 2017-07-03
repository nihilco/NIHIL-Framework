<?php

namespace Tests\Feature;

use Tests\TestCase;

class SubscriptionsControllerTest extends TestCase
{
    protected $subscription;
    
    public function setUp()
    {
        parent::setUp();

        $this->subscription = create('App\Models\Subscription');
    }

}