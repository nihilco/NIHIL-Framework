<?php

namespace Tests\Feature;

use Tests\TestCase;

class SessionsControllerTest extends TestCase
{
    protected $session;
    
    public function setUp()
    {
        parent::setUp();

        $this->session = create('App\Models\Session');
    }

}