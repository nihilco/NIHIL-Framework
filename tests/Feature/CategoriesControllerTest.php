<?php

namespace Tests\Feature;

use Tests\TestCase;

class CategoriesControllerTest extends TestCase
{
    protected $category;
    
    public function setUp()
    {
        parent::setUp();

        $this->category = create('App\Models\Category');
    }

}