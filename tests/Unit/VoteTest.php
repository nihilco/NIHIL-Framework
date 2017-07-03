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
    
    public function test_vote_has_an_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->vote->user);
    }

}