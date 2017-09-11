<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FollowTest extends TestCase
{
    use Databasetransactions;

    protected $follow;
    
    public function setUp()
    {
        parent::setUp();

        $this->follow = create('App\Models\Follow');
    }

    public function test_a_follow_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->follow->creator);
    }

    public function test_a_follow_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->follow->user);
    }

    public function test_a_follow_has_a_resource()
    {
        $this->assertInstanceOf($this->follow->resource_type, $this->follow->resource);
    }

}