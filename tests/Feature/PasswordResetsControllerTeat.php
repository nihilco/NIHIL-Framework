<?php

namespace Tests\Feature;

use Tests\TestCase;

class PasswordResetsControllerTest extends TestCase
{
    protected $passwordReset;
    
    public function setUp()
    {
        parent::setUp();

        $this->passwordReset = create('App\Models\PasswordReset');
    }

}