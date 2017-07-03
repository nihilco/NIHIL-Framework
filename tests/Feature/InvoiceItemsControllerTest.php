<?php

namespace Tests\Feature;

use Tests\TestCase;

class InvoiceItemsControllerTest extends TestCase
{
    protected $invoiceItem;
    
    public function setUp()
    {
        parent::setUp();

        $this->invoiceItem = create('App\Models\InvoiceItem');
    }

}