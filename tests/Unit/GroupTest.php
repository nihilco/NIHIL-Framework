<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GroupTest extends TestCase
{
    use Databasetransactions;

    protected $group;
    
    public function setUp()
    {
        parent::setUp();

        $this->group = create('App\Models\Group');
    }

    public function test_a_group_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->group->user);
    }
    
}