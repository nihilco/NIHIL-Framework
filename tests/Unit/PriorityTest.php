<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PriorityTest extends TestCase
{
    use Databasetransactions;

    protected $priority;
    
    public function setUp()
    {
        parent::setUp();

        $this->priority = create('App\Models\Priority');
    }

    public function test_a_priority_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->priority->user);
    }
    
}