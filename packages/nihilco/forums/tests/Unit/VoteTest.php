<?php

namespace NIHILCo\Forums\Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VoteTest extends TestCase
{
    use Databasetransactions;

    protected $vote;

    public function setUp()
    {
        parent::setUp();

        $this->vote = create('NIHILCo\Forums\Models\Vote');
    }
    
    public function test_vote_has_an_user()
    {
        $this->assertInstanceOf('App\User', $this->vote->user);
    }
}