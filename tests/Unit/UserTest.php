<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use Databasetransactions;

    protected $user;
    
    public function setUp()
    {
        parent::setUp();

        $this->user = create('App\Models\User');
    }

    public function test_user_has_accounts()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->accounts);
    }

    public function test_user_has_activities()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->activities);
    }

    public function test_user_has_customers()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->customers);
    }
   
    public function test_user_has_emails()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->emails);
    }
   
    public function test_user_has_favorites()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->favorites);
    }
   
    public function test_user_has_forums()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->forums);
    }
   
    public function test_user_has_issues()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->issues);
    }
   
    public function test_user_has_ratings()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->ratings);
    }

    public function test_user_has_replies()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->replies);
    }
   
    public function test_user_has_threads()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->threads);
    }
   
    public function test_user_has_votes()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->votes);
    }
   
}