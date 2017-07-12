<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StateTest extends TestCase
{
    use Databasetransactions;

    protected $state;
    
    public function setUp()
    {
        parent::setUp();

        $this->state = create('App\Models\State');
    }

    public function test_a_state_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->state->user);
    }

    public function test_a_state_has_a_country()
    {
        $this->assertInstanceOf('App\Models\Country', $this->state->country);
    }
    
}