<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookTest extends TestCase
{
    use Databasetransactions;

    protected $book;
    
    public function setUp()
    {
        parent::setUp();

        $this->book = create('App\Models\Book');
    }

    public function test_a_book_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->book->creator);
    }
    
}