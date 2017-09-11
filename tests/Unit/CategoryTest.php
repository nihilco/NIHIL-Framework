<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{
    use Databasetransactions;

    protected $category;
    
    public function setUp()
    {
        parent::setUp();

        $this->category = create('App\Models\Category');
    }

    public function test_a_category_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->category->creator);
    }

    public function test_a_category_has_a_parent()
    {
        $result = false;
        if(($this->category->parent == null) || (get_class($this->category->parent) == 'App\Models\Category')) {
            $result = true;
        }

        $this->assertTrue($result);
    }
    
}