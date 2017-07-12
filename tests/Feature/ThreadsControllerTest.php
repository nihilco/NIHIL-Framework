<?php

namespace Tests\Feature;

use Tests\TestCase;

class ThreadsControllerTest extends TestCase
{
    protected $forum;
    protected $thread;
    
    public function setUp()
    {
        parent::setUp();
        
        $this->forum = create('App\Models\Forum');
        $this->thread = create('App\Models\Thread', ['forum_id' => $this->forum->id]);
    }

    public function test_threads_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/forums/threads');
        $response->assertStatus(200);

        // SHOW 
        $response = $this->get($this->thread->path());
        $response->assertStatus(200);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get($this->forum->path() . '/threads/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post($this->forum->path() . '/threads');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->thread->path());
        $response->assertStatus(302);
    }    

    public function publishThread($overrides = [])
    {
        $this->signIn();

        $overrides['forum_id'] = $this->forum->id;
        
        $newThread = make('App\Models\Thread', $overrides);
        
        return $this->post($this->forum->path() . '/threads', $newThread->toArray());
    }
    
    public function test_a_guest_can_view_threads()
    {
        $response = $this->get($this->forum->path());
        $response->assertStatus(200);
        $response->assertSee($this->thread->title);
    }

    public function test_a_guest_can_view_specific_thread()
    {
        $response = $this->get($this->thread->path());
        $response->assertStatus(200);
        $response->assertSee($this->thread->title);
    }

    public function test_a_guest_can_read_replies_associated_with_a_thread()
    {
        $reply = create('App\Models\Reply', ['resource_id' => $this->thread->id, 'resource_type' => get_class($this->thread)]);

        $response = $this->get($this->thread->path());
        $response->assertSee($reply->content);
    }

    public function test_a_user_can_create_a_new_thread()
    {
        $this->signIn();

        $newThread = make('App\Models\Thread');

        $this->post($this->forum->path() . '/threads', $newThread->toArray());

        $response = $this->get($this->forum->path());

        $response->assertSee($this->thread->title);
    }

    public function test_a_guest_cannot_create_a_new_thread()
    {
        $newThread = make('App\Models\Thread');

        $response = $this->post($this->forum->path() . '/threads', $newThread->toArray());
        $response->assertRedirect('/login');
    }

    public function test_a_guest_cannot_view_thread_create_page()
    {
        $this->get($this->forum->path() . '/threads/create')
             ->assertRedirect('/login');
    }

    public function test_a_user_can_view_thread_create_page()
    {
        $this->signIn();

        $response = $this->get($this->forum->path() . '/threads/create');
        $response->assertStatus(200);
    }

    public function test_a_thread_requires_a_title()
    {
        $this->publishThread(['title' => null])
             ->assertSessionHasErrors('title');
    }

    public function test_a_thread_requires_a_slug()
    {
        $this->publishThread(['slug' => null])
             ->assertSessionHasErrors('slug');
    }

    public function test_a_thread_requires_a_body()
    {
        $this->publishThread(['body' => null])
             ->assertSessionHasErrors('body');
    }

    public function test_threads_are_grouped_by_forum()
    {
        $newForum = create('App\Models\Forum');
        $newThreadInForum = create('App\Models\Thread', ['forum_id' => $newForum->id]);
        $newThreadNotInForum = create('App\Models\Thread');

        $response = $this->get($newForum->path());
        $response->assertSee($newThreadInForum->title);
        $response->assertDontSee($newThreadNotInForum->title);   
    }

    public function test_a_user_can_filter_threads_by_username()
    {
        $this->signIn('App\Models\User', ['username' => 'jdoe']);

        $threadByJohn = create('App\Models\Thread', ['user_id' => auth()->id()]);
        $threadNotByJohn = create('App\Models\Thread');

        $this->get('/forums/threads?username=jdoe')
             ->assertSee($threadByJohn->title)
             ->assertDontSee($threadNotByJohn->title);
    }
/*
    public function test_a_user_can_filter_threads_by_reply_count()
    {
        $threadWithTwentySevenReplies = create('App\Models\Thread');
        create('App\Models\Reply', ['resource_id' => $threadWithTwentySevenReplies->id, 'resource_type' => get_class($threadWithTwentySevenReplies)], 27);

        $threadWithTwentyEightReplies = create('App\Models\Thread');
        create('App\Models\Reply', ['resource_id' => $threadWithTwentyEightReplies->id, 'resource_type' => get_class($threadWithTwentyEightReplies)], 28);

        $threadWithTwentySixReplies = create('App\Models\Thread');
        create('App\Models\Reply', ['resource_id' => $threadWithTwentySixReplies->id, 'resource_type' => get_class($threadWithTwentySixReplies)], 26);
        
        $response = $this->getJson('/forums/threads?replies=1')->json();
        $c = count($response);
        for($i = 0; $i < $c; $i++) {
            if($i > 2) {
                unset($response[$i]);
            }
        }

        $this->assertEquals(['28', '27', '26'], array_column($response, 'replies_count'));
    }
*/
    public function test_a_guest_cannot_delete_threads()
    {
        $newThread = create('App\Models\Thread');
               
        $response = $this->delete($newThread->path());

        $response->assertRedirect('/login');
    }

    public function test_a_user_cannot_delete_another_users_threads()
    {
        $this->signIn();

        $newThread = create('App\Models\Thread');
               
        $response = $this->delete($newThread->path());

        $response->assertStatus(403);
    }

    public function test_threads_may_only_be_deleted_by_those_who_have_permission()
    {
        // TODO
    }
/*
    public function test_a_thread_can_be_deleted()
    {
        $this->signIn();

        $newThread = create('App\Models\Thread', ['user_id' => auth()->id()]);
        $newReply = create('App\Models\Reply', ['resource_id' => $newThread->id, 'resource_type' => get_class($newThread)]);
        $newThreadVote = create('App\Models\Vote', ['resource_id' => $newThread->id, 'resource_type' => App\Models\Thread::class]);
        $newReplyVote = create('App\Models\Vote', ['resource_id' => $newReply->id, 'resource_type' => App\Models\Reply::class]);

        $response = $this->json('DELETE', $newThread->path());

        $response->assertStatus(204);
        $this->assertSoftDeleted('threads', ['id' => $newThread->id]);
        $this->assertSoftDeleted('replies', ['id' => $newReply->id]);
        $this->assertSoftDeleted('votes', ['id' => $newThreadVote->id]);
        $this->assertSoftDeleted('votes', ['id' => $newReplyVote->id]);
        $this->assertSoftDeleted('activities', [
            'user_id' => auth()->id(),
            'resource_id' => $newThread->id,
            'resource_type' => get_class($newThread),
        ]);
        $this->assertSoftDeleted('activities', [
            'user_id' => auth()->id(),
            'resource_id' => $newReply->id,
            'resource_type' => get_class($newReply),
        ]);
    }
*/
}