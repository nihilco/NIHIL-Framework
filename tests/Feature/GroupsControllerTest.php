<?php

namespace Tests\Feature;

use Tests\TestCase;

class GroupsControllerTest extends TestCase
{
    protected $group;
    
    public function setUp()
    {
        parent::setUp();

        $this->group = create('App\Models\Group');
    }

}