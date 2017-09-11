<?php

namespace Tests\Feature;

use Tests\TestCase;

class PostsControllerTest extends TestCase
{
    protected $post;
    
    public function setUp()
    {
        parent::setUp();

        $this->post = create('App\Models\Post');
    }
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_posts_controller_routes()
    {
        // INDEX
        $response = $this->get('/posts');
        $response->assertStatus(200);

        // SHOW 
        $response = $this->get($this->post->path());
        $response->assertStatus(200);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/posts/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/posts');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->post->path());
        $response->assertStatus(302);
    }

        public function test_a_post_requires_a_title()
    {
        $this->publishPost(['title' => null])
             ->assertSessionHasErrors('title');
    }

    public function test_a_post_requires_a_slug()
    {
        $this->publishPost(['slug' => null])
             ->assertSessionHasErrors('slug');
    }

    public function test_a_post_requires_a_description()
    {
        $this->publishPost(['description' => null])
             ->assertSessionHasErrors('description');
    }

    public function test_a_post_requires_content()
    {
        $this->publishPost(['content' => null])
             ->assertSessionHasErrors('content');
    }

    public function publishPost($overrides = [])
    {
        $this->signIn();

        $overrides['user_id'] = auth()->id();
        
        $newPage = make('App\Models\Post', $overrides);

        return $this->post('/posts', $newPage->toArray());
    }
}
