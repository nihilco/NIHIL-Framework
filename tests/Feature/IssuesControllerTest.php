<?php

namespace Tests\Feature;

use Tests\TestCase;

class IssuesControllerTest extends TestCase
{
    protected $issue;
    
    public function setUp()
    {
        parent::setUp();

        $this->issue = create('App\Models\Issue');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_issues_controller_routes()
    {
        // User not logged in, redirect to login
        $response = $this->get('/issues/create');
        $response->assertStatus(302);

        //
        $response = $this->get('/issues');
        $response->assertStatus(302);
    }
}
