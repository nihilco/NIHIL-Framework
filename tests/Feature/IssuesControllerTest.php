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

    public function test_issues_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/issues');
        $response->assertStatus(200);

        // SHOW
        $response = $this->get($this->issue->path());
        $response->assertStatus(200);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/issues/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/issues');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->issue->path());
        $response->assertStatus(302);
    }
}
