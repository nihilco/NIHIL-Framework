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
    
}