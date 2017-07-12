<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PlanTest extends TestCase
{
    use Databasetransactions;

    protected $plan;
    
    public function setUp()
    {
        parent::setUp();

        $this->plan = create('App\Models\Plan');
    }

    public function test_a_plan_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->plan->user);
    }

    public function test_a_plan_has_an_account()
    {
        $this->assertInstanceOf('App\Models\Account', $this->plan->account);
    }

    public function test_a_plan_has_subscriptions()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->plan->subscriptions);
    }
    
}