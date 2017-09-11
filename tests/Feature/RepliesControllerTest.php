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
        $response = $this->post('/replies');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->reply->path());
        $response->assertStatus(302);
    }

    public function test_a_guest_cannot_add_replies()
    {
        $newReply = make('App\Models\Reply');
        
        $response = $this->post('/replies', $newReply->toArray());
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_a_user_can_reply_to_thread()
    {
        $this->signIn();

        $newReply = make('App\Models\Reply', ['creator_id' => auth()->id(), 'user_id' => auth()->id(), 'resource_id' => $this->thread->id, 'resource_type' => get_class($this->thread)]);

        $r = $this->post('/replies', $newReply->toArray());

        $response = $this->get($this->thread->path());

        $response->assertSee($newReply->content);
        $this->assertEquals(2, $this->thread->fresh()->replies_count);
    }

    public function test_a_guest_cannot_view_reply_create_page()
    {
        $this->get('/replies/create')
             ->assertRedirect('/login');
    }

    public function test_a_user_can_view_reply_create_page()
    {
        $this->signIn();

        $response = $this->get('/replies/create');
        $response->assertStatus(200);
    }

    public function test_a_reply_requires_content()
    {
        $this->publishReply(['content' => null])
             ->assertSessionHasErrors('content');
    }

    public function test_replies_are_grouped_by_thread()
    {
        $newThread = create('App\Models\Thread', ['forum_id' => $this->forum->id]);
        $newReplyInThread = create('App\Models\Reply', ['resource_id' => $newThread->id, 'resource_type' => get_class($newThread)]);
        $newReplyNotInThread = create('App\Models\Reply');

        $response = $this->get($newThread->path());
        $response->assertSee($newReplyInThread->content);
        $response->assertDontSee($newReplyNotInThread->content);
    }

    public function publishReply($overrides = [])
    {
        $this->signIn();

        $overrides['resource_id'] = $this->thread->id;
        $overrides['resource_type'] = get_class($this->thread);
        $overrides['user_id'] = auth()->id();
        
        $newReply = make('App\Models\Reply', $overrides);

        return $this->post('/replies', $newReply->toArray());
    }

    public function test_a_guest_cannot_delete_reply()
    {
        $newReply = create('App\Models\Reply');
               
        $response = $this->delete($newReply->path());

        $response->assertRedirect('/login');
    }

    public function test_a_user_cannot_delete_another_users_replies()
    {
        $this->signIn();

        $newReply = create('App\Models\Reply');
               
        $response = $this->delete($newReply->path());

        $response->assertStatus(403);
    }
/*
    public function test_replies_may_only_be_deleted_by_those_who_have_permission()
    {
        // TODO
    }

    public function test_a_reply_can_be_deleted()
    {
        $this->signIn();

        $newReply = create('App\Models\Reply', ['user_id' => auth()->id(), 'resource_id' => $this->thread->id, 'resource_type' => get_class($this->thread)]);
        $newReplyVote = create('App\Models\Vote', ['resource_id' => $newReply->id, 'resource_type' => get_class($newReply)]);

        $response = $this->json('DELETE', $newReply->path());

        //dd($response);
        //dd([$newReply->user_id, auth()->id(), auth()->user()->can('delete', $newReply)]);
        
        $response->assertStatus(204);
        $this->assertSoftDeleted('replies', ['id' => $newReply->id]);
        $this->assertSoftDeleted('votes', ['id' => $newReplyVote->id]);
        $this->assertEquals(0, $this->thread->replies_count);
    }
*/
}