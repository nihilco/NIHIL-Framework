<?php

namespace Tests\Feature;

use Tests\TestCase;

class PagesControllerTest extends TestCase
{
    protected $page;

    public function setUp()
    {
        parent::setUp();

        $this->page = create('App\Models\Page');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_pages_controller_routes()
    {
        // INDEX
        $response = $this->get('/pages');
        $response->assertStatus(200);

        // SHOW 
        $response = $this->get($this->page->path());
        $response->assertStatus(200);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/pages/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/pages');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->page->path());
        $response->assertStatus(302);
    }

    public function test_a_page_requires_a_title()
    {
        $this->publishPage(['title' => null])
             ->assertSessionHasErrors('title');
    }

    public function test_a_page_requires_a_slug()
    {
        $this->publishPage(['slug' => null])
             ->assertSessionHasErrors('slug');
    }

    public function test_a_page_requires_a_description()
    {
        $this->publishPage(['description' => null])
             ->assertSessionHasErrors('description');
    }

    public function test_a_page_requires_content()
    {
        $this->publishPage(['content' => null])
             ->assertSessionHasErrors('content');
    }

    public function publishPage($overrides = [])
    {
        $this->signIn();

        $overrides['user_id'] = auth()->id();
        
        $newPage = make('App\Models\Page', $overrides);

        return $this->post('/pages', $newPage->toArray());
    }
}
