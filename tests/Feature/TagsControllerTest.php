<?php

namespace Tests\Feature;

use Tests\TestCase;

class TagsControllerTest extends TestCase
{
    protected $tag;
    
    public function setUp()
    {
        parent::setUp();

        $this->tag = create('App\Models\Tag');
    }

}