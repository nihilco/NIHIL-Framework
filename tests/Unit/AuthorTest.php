<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthorTest extends TestCase
{
    use Databasetransactions;

    protected $country;
    
    public function setUp()
    {
        parent::setUp();

        $this->author = create('App\Models\Author');
    }

    public function test_an_author_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->author->creator);
    }
    
}