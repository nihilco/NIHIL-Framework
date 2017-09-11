<?php

namespace Tests\Feature;

use Tests\TestCase;

class BooksControllerTest extends TestCase
{
    protected $book;
    
    public function setUp()
    {
        parent::setUp();

        $this->book = create('App\Models\Book');
    }

    public function test_books_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/books');
        $response->assertStatus(200);

        // SHOW 
        $response = $this->get($this->book->path());
        $response->assertStatus(200);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/books/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/books');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->book->path());
        $response->assertStatus(302);
    }
}