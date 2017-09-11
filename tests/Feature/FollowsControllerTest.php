<?php

namespace Tests\Feature;

use Tests\TestCase;

class FollowsControllerTest extends TestCase
{
    protected $follow;
    
    public function setUp()
    {
        parent::setUp();

        $this->follow = create('App\Models\Follow');
    }

    public function test_follows_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/follows');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->follow->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/follows/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/follows');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->follow->path());
        $response->assertStatus(302);
    }

    public function test_a_user_can_follow_threads()
    {
        $this->signIn();

        $thread = create('App\Models\Thread');

        $follow = make('App\Models\Follow', ['creator_id' => auth()->id(), 'user_id' => auth()->id(), 'resource_id' => $thread->id, 'resource_type' => get_class($thread)]);

        $response = $this->post('/follows', $follow->toArray());

        $this->assertCount(1, $thread->fresh()->follows);
    }
}