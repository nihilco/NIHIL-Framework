<?php

namespace Tests\Feature;

use Tests\TestCase;

class VotesControllerTest extends TestCase
{
    protected $forum;
    protected $thread;
    protected $reply;
    protected $vote;
    
    public function setUp()
    {
        parent::setUp();

        $this->forum = create('App\Models\Forum');
        $this->thread = create('App\Models\Thread', ['forum_id' => $this->forum->id]);
        $this->reply = create('App\Models\Reply', ['resource_id' => $this->thread->id, 'resource_type' => get_class($this->thread)]);

        $this->vote = create('App\Models\Vote', ['user_id' => 1, 'resource_id' => $this->reply->id, 'resource_type' => get_class($this->reply), 'vote' => 'up']);
    }

    public function test_votes_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/votes');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->vote->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/votes/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/votes');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->vote->path());
        $response->assertStatus(302);
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