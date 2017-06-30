<?php

namespace NIHILCo\Forums\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RepliesTest extends TestCase
{
    use DatabaseTransactions;
    
    protected $forum;
    protected $thread;
    
    public function setUp()
    {
        parent::setUp();

        $this->forum = create('NIHILCo\Forums\Models\Forum');
        $this->thread = create('NIHILCo\Forums\Models\Thread', ['forum_id' => $this->forum->id]);
    }

    public function test_a_guest_cannot_add_replies()
    {
        $newReply = make('NIHILCo\Forums\Models\Reply');
        
        \Session::start();
        $a = array_merge($newReply->toArray(), ['_token' => csrf_token()]);
        $response = $this->post($this->thread->path() . '/replies', $a);
        $response->assertRedirect('/login');
    }

    public function test_a_user_can_reply_to_thread()
    {
        $this->signIn();

        $newReply = make('NIHILCo\Forums\Models\Reply');

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
        $newThread = create('NIHILCo\Forums\Models\Thread', ['forum_id' => $this->forum->id]);
        $newReplyInThread = create('NIHILCo\Forums\Models\Reply', ['thread_id' => $newThread->id]);
        $newReplyNotInThread = create('NIHILCo\Forums\Models\Reply');

        $response = $this->get($newThread->path());
        $response->assertSee($newReplyInThread->body);
        $response->assertDontSee($newReplyNotInThread->body);
        
    }

    public function publishReply($overrides = [])
    {
        $this->signIn();

        $overrides['thread_id'] = $this->thread->id;
        
        $newReply = make('NIHILCo\Forums\Models\Reply', $overrides);

        \Session::start();
        $a = array_merge($newReply->toArray(), ['_token' => csrf_token()]);
        
        return $this->post($this->thread->path() . '/replies', $a);
    }

    public function test_a_guest_cannot_delete_reply()
    {
        $newReply = create('NIHILCo\Forums\Models\Reply');
               
        \Session::start();
        $response = $this->delete($newReply->path(), ['_token' => csrf_token()]);

        $response->assertRedirect('/login');
    }

    public function test_a_user_cannot_delete_another_users_replies()
    {
        $this->signIn();

        $newReply = create('NIHILCo\Forums\Models\Reply');
               
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

        $newReply = create('NIHILCo\Forums\Models\Reply', ['user_id' => auth()->id()]);
        $newReplyVote = create('NIHILCo\Forums\Models\Vote', ['resource_id' => $newReply->id, 'resource_type' => \NIHILCo\Forums\Models\Reply::class]);

        $response = $this->json('DELETE', $newReply->path(), ['_token' => csrf_token()]);

        //dd([$newReply->user_id, auth()->id(), auth()->user()->can('update', $newReply)]);
        
        $response->assertStatus(204);
        $this->assertSoftDeleted('forums_replies', ['id' => $newReply->id]);
        $this->assertSoftDeleted('forums_votes', ['id' => $newReplyVote->id]);
    }
}