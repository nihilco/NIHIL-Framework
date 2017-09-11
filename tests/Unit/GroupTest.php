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

    public function test_a_group_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->group->creator);
    }

    public function test_a_group_has_a_parent()
    {
        $result = false;
        if(($this->group->parent == null) || (get_class($this->group->parent) == 'App\Models\Group')) {
            $result = true;
        }

        $this->assertTrue($result);
    }
    
}