<?php

namespace Tests\Feature;

use Tests\TestCase;

class TypesControllerTest extends TestCase
{
    protected $type;
    
    public function setUp()
    {
        parent::setUp();

        $this->type = create('App\Models\Type');
    }
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_types_controller_routes()
    {
        // User not logged in, redirect to login
        $response = $this->get('/types/create');
        $response->assertStatus(302);

        //
        $reponse = $this->get('/types');
        $response->assertStatus(302);
    }
}
