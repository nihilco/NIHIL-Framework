<?php

namespace Tests\Feature;

use Tests\TestCase;

class ForumsControllerTest extends TestCase
{
    protected $forum;
    
    public function setUp()
    {
        parent::setUp();

        $this->forum = create('App\Models\Forum');
    }
/*
    public function test_a_guest_can_view_forums()
    {
        $response = $this->get('forums');
        $response->assertStatus(200);
        $response->assertSee($this->forum->title);
    }

    public function test_a_guest_can_view_specific_forum()
    {
        $response = $this->get($this->forum->path());
        $response->assertStatus(200);
        $response->assertSee($this->forum->title);
    }

    public function test_a_guest_can_read_threads_associated_with_a_forum()
    {
        $thread = create('App\Models\Thread', ['forum_id' => $this->forum->id]);

        $response = $this->get($this->forum->path());
        $response->assertSee($thread->title);
    }

    public function test_a_user_can_create_a_new_forum()
    {
        $this->signIn();
    
        $newForum = make('App\Models\Forum');
    
        \Session::start();
        $a = array_merge($newForum->toArray(), ['_token' => csrf_token()]);
        
        $this->post('/forums', $a);
    
        $response = $this->get('/forums');
        $response->assertSee($newForum->title);
    }

    
    public function test_a_guest_cannot_create_a_new_forum()
    {
        $newForum = make('App\Models\Forum');

        \Session::start();
        $a = array_merge($newForum->toArray(), ['_token' => csrf_token()]);

        $response = $this->post('/forums', $a);
        $response->assertRedirect('/login');
    }

    public function test_a_guest_cannot_view_forum_create_page()
    {
        $this->get('/forums/create')
             ->assertRedirect('/login');
    }

    public function test_a_user_can_view_forum_create_page()
    {
        $this->signIn();

        $response = $this->get('/forums/create');
        $response->assertStatus(200);
    }

    public function test_a_forum_requires_a_title()
    {
        $this->publishForum(['title' => null])
             ->assertSessionHasErrors('title');
    }

    public function test_a_forum_requires_a_slug()
    {
        $this->publishForum(['slug' => null])
             ->assertSessionHasErrors('slug');
    }

    public function test_a_forum_requires_a_description()
    {
        $this->publishForum(['description' => null])
             ->assertSessionHasErrors('description');
    }

    public function publishForum($overrides = [])
    {
        $this->signIn();
        
        $newForum = make('App\Models\Forum', $overrides);

        \Session::start();
        $a = array_merge($newForum->toArray(), ['_token' => csrf_token()]);
        
        return $this->post('/forums', $a);
    }

    public function test_a_guest_cannot_delete_forums()
    {
        $newForum = create('App\Models\Forum');
               
        \Session::start();
        $response = $this->delete($newForum->path(), ['_token' => csrf_token()]);

        $response->assertRedirect('/login');
    }

    public function test_a_user_cannot_delete_another_users_forums()
    {
        $this->signIn();

        $newForum = create('App\Models\Forum');
               
        \Session::start();
        $response = $this->delete($newForum->path(), ['_token' => csrf_token()]);

        $response->assertStatus(403);
    }

    public function test_forums_may_only_be_deleted_by_those_who_have_permission()
    {
        // TODO
    }

    public function test_a_forum_can_be_deleted()
    {
        \Session::start();
        
        $this->signIn();

        $newForum = create('App\Models\Forum', ['user_id' => auth()->id()]);
//        $newThread = create('App\Models\Thread', ['forum_id' => $newForum->id]);
//        $newReply = create('App\Models\Reply', ['thread_id' => $newThread->id]);
//        $newThreadVote = create('App\Models\Vote', ['resource_id' => $newThread->id, 'resource_type' => App\Models\Thread::class]);
//        $newReplyVote = create('App\Models\Vote', ['resource_id' => $newReply->id, 'resource_type' => App\Models\Reply::class]);
        
        $response = $this->json('DELETE', $newForum->path(), ['_token' => csrf_token()]);

        //dd($response);
        //dd([$newForum->user_id, auth()->id(), auth()->user()->can('update', $newForum)]);
        
        $response->assertStatus(204);
        $this->assertSoftDeleted('forums_forums', ['id' => $newForum->id]);
        $this->assertSoftDeleted('forums_threads', ['id' => $newThread->id]);
        $this->assertSoftDeleted('forums_replies', ['id' => $newReply->id]);
        $this->assertSoftDeleted('forums_votes', ['id' => $newThreadVote->id]);
        $this->assertSoftDeleted('forums_votes', ['id' => $newReplyVote->id]);
    }
    */
}