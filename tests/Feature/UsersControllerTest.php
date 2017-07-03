<?php

namespace Tests\Feature;

use Tests\TestCase;

class UsersControllerTest extends TestCase
{
    protected $user;
    
    public function setUp()
    {
        parent::setUp();

        $this->user = create('App\Models\User');
    }

}