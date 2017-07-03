<?php

namespace Tests\Feature;

use Tests\TestCase;

class PaymentsControllerTest extends TestCase
{
    protected $payment;
    
    public function setUp()
    {
        parent::setUp();

        $this->payment = create('App\Models\Payment');
    }

}