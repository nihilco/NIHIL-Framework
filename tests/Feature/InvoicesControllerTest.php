<?php

namespace Tests\Feature;

use Tests\TestCase;

class InvoicesControllerTest extends TestCase
{
    protected $invoice;
    
    public function setUp()
    {
        parent::setUp();

        $this->invoice = create('App\Models\Invoice');
    }

}