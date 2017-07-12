<?php

namespace Tests\Feature;

use Tests\TestCase;

class GroupsControllerTest extends TestCase
{
    protected $group;
    
    public function setUp()
    {
        parent::setUp();

        $this->group = create('App\Models\Group');
    }

    public function test_groups_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/groups');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->group->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/groups/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/groups');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->group->path());
        $response->assertStatus(302);
    }
}