<?php

namespace Tests\Feature;

use Tests\TestCase;

class VotesControllerTest extends TestCase
{
    protected $forum;
    protected $thread;
    protected $reply;
    
    public function setUp()
    {
        parent::setUp();

        $this->forum = create('App\Models\Forum');
        $this->thread = create('App\Models\Thread', ['forum_id' => $this->forum->id]);
        $this->reply = create('App\Models\Reply', ['thread_id' => $this->thread->id]);
    }
/*
    public function test_a_guest_cannot_vote()
    {
        \Session::start();
                
        $this->post($this->thread->path() . '/vote', ['vote' => Vote::VOTE_DOWN, '_token' => csrf_token()])
             ->assertRedirect('/login');

        $this->post($this->reply->path() . '/vote', ['vote' => Vote::VOTE_UP, '_token' => csrf_token()])
             ->assertRedirect('/login');
    }

    public function test_a_user_can_vote_on_a_thread()
    {
        $this->signIn();

        \Session::start();
        $this->post($this->thread->path() . '/vote', ['vote' => Vote::VOTE_UP, '_token' => csrf_token()]);

        $this->assertCount(1, $this->thread->votes);
    }

    public function test_a_user_can_vote_on_a_reply()
    {
        $this->signIn();
        
        \Session::start();
        $this->post($this->reply->path() . '/vote', ['vote' => Vote::VOTE_DOWN, '_token' => csrf_token()]);
        
        $this->assertCount(1, $this->reply->votes);
    }

    public function test_a_user_can_vote_on_a_thread_only_once()
    {
        $this->signIn();

        \Session::start();
        $this->post($this->thread->path() . '/vote', ['vote' => Vote::VOTE_UP, '_token' => csrf_token()]);
        $this->post($this->thread->path() . '/vote', ['vote' => Vote::VOTE_UP, '_token' => csrf_token()]);

        $this->assertCount(1, $this->thread->votes);
    }

    public function test_a_user_can_vote_on_a_reply_only_once()
    {
        $this->signIn();
        
        \Session::start();
        $this->post($this->reply->path() . '/vote', ['vote' => Vote::VOTE_DOWN, '_token' => csrf_token()]);
        $this->post($this->reply->path() . '/vote', ['vote' => Vote::VOTE_DOWN, '_token' => csrf_token()]);
        
        $this->assertCount(1, $this->reply->votes);
    }
*/
}