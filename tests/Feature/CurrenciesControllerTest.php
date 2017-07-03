<?php

namespace Tests\Feature;

use Tests\TestCase;

class CurrenciesControllerTest extends TestCase
{
    protected $currency;
    
    public function setUp()
    {
        parent::setUp();

        $this->currency = create('App\Models\Currency');
    }

}