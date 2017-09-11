<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VoteTest extends TestCase
{
    use Databasetransactions;

    protected $vote;

    public function setUp()
    {
        parent::setUp();

        $this->vote = create('App\Models\Vote');
    }
    
    public function test_vote_has_an_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->vote->creator);
    }

    public function test_vote_has_an_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->vote->user);
    }

    public function test_vote_has_a_resource()
    {
        $this->assertInstanceOf($this->vote->resource_type, $this->vote->resource);
    }
}