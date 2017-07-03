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
        // User not logged in, redirect to login
        $response = $this->get('/pages/create');
        $response->assertStatus(302);

        //
        $reponse = $this->get('/pages');
        $response->assertStatus(302);
    }
}
