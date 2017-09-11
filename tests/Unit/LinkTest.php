<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LinkTest extends TestCase
{
    use Databasetransactions;

    protected $link;
    
    public function setUp()
    {
        parent::setUp();

        $this->link = create('App\Models\Link');
    }

    public function test_a_link_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->link->creator);
    }
    
}