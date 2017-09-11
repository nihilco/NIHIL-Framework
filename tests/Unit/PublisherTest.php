<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PublisherTest extends TestCase
{
    use Databasetransactions;

    protected $publisher;
    
    public function setUp()
    {
        parent::setUp();

        $this->publisher = create('App\Models\Publisher');
    }

    public function test_a_publisher_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->publisher->creator);
    }

    public function test_a_publisher_has_a_address()
    {
        $this->assertInstanceOf('App\Models\Address', $this->publisher->address);
    }

    public function test_a_publisher_has_a_parent()
    {
        $result = false;
        if(($this->publisher->parent == null) || (get_class($this->publsiher->parent) == 'App\Models\Publisher')) {
            $result = true;
        }

        $this->assertTrue($result);
    }

}