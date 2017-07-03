<?php

namespace Tests\Feature;

use Tests\TestCase;

class EmailsControllerTest extends TestCase
{
    protected $email;
    
    public function setUp()
    {
        parent::setUp();

        $this->email = create('App\Models\Email');
    }

}