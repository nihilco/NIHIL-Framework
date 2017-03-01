<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypesControllerTest extends TestCase
{
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
