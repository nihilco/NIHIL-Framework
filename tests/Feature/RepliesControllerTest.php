<?php

namespace Tests\Feature;

use Tests\TestCase;

class RepliesControllerTest extends TestCase
{
    protected $forum;
    protected $thread;
    protected $reply;
    
    public function setUp()
    {
        parent::setUp();

        $this->forum = create('App\Models\Forum');
        $this->thread = create('App\Models\Thread', ['forum_id' => $this->forum->id]);
        $this->reply = create('App\Models\Reply', ['resource_id' => $this->thread->id, 'resource_type' => get_class($this->thread)]);
    }

    public function test_replies_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/replies');
        $response->assertStatus(200);

        // SHOW 
        $response = $this->get($this->reply->path());
        $response->assertStatus(200);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/replies/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        //$response = $this->post('/replies');
        //$response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        //$response = $this->delete($this->reply->path());
        //$response->assertStatus(302);
    }
/*
    public function test_a_guest_cannot_add_replies()
    {
        $newReply = make('App\Models\Reply');
        
        \Session::start();
        $a = array_merge($newReply->toArray(), ['_token' => csrf_token()]);
        $response = $this->post($this->thread->path() . '/replies', $a);
        $response->assertRedirect('/login');
    }

    public function test_a_user_can_reply_to_thread()
    {
        $this->signIn();

        $newReply = make('App\Models\Reply');

        \Session::start();
        $a = array_merge($newReply->toArray(), ['_token' => csrf_token()]);
        $this->post($this->thread->path() . '/replies', $a);

        $response = $this->get($this->thread->path());

        $response->assertSee($newReply->body);
    }

    public function test_a_guest_cannot_view_reply_create_page()
    {
        $this->get($this->thread->path() . '/replies/create')
             ->assertRedirect('/login');
    }

    public function test_a_user_can_view_reply_create_page()
    {
        $this->signIn();

        $response = $this->get($this->thread->path() . '/replies/create');
        $response->assertStatus(200);
    }

    public function test_a_reply_requires_a_body()
    {
        $this->publishReply(['body' => null])
             ->assertSessionHasErrors('body');
    }

    public function test_replies_are_grouped_by_thread()
    {
        $newThread = create('App\Models\Thread', ['forum_id' => $this->forum->id]);
        $newReplyInThread = create('App\Models\Reply', ['thread_id' => $newThread->id]);
        $newReplyNotInThread = create('App\Models\Reply');

        $response = $this->get($newThread->path());
        $response->assertSee($newReplyInThread->body);
        $response->assertDontSee($newReplyNotInThread->body);
        
    }

    public function publishReply($overrides = [])
    {
        $this->signIn();

        $overrides['thread_id'] = $this->thread->id;
        
        $newReply = make('App\Models\Reply', $overrides);

        \Session::start();
        $a = array_merge($newReply->toArray(), ['_token' => csrf_token()]);
        
        return $this->post($this->thread->path() . '/replies', $a);
    }

    public function test_a_guest_cannot_delete_reply()
    {
        $newReply = create('App\Models\Reply');
               
        \Session::start();
        $response = $this->delete($newReply->path(), ['_token' => csrf_token()]);

        $response->assertRedirect('/login');
    }

    public function test_a_user_cannot_delete_another_users_replies()
    {
        $this->signIn();

        $newReply = create('App\Forums\Models\Reply');
               
        \Session::start();
        $response = $this->delete($newReply->path(), ['_token' => csrf_token()]);

        $response->assertStatus(403);
    }

    public function test_replies_may_only_be_deleted_by_those_who_have_permission()
    {
        // TODO
    }

    public function test_a_reply_can_be_deleted()
    {
        \Session::start();
        
        $this->signIn();

        $newReply = create('App\Models\Reply', ['user_id' => auth()->id()]);
        $newReplyVote = create('App\Models\Vote', ['resource_id' => $newReply->id, 'resource_type' => App\Models\Reply::class]);

        $response = $this->json('DELETE', $newReply->path(), ['_token' => csrf_token()]);

        //dd([$newReply->user_id, auth()->id(), auth()->user()->can('update', $newReply)]);
        
        $response->assertStatus(204);
        $this->assertSoftDeleted('forums_replies', ['id' => $newReply->id]);
        $this->assertSoftDeleted('forums_votes', ['id' => $newReplyVote->id]);
    }
*/
}