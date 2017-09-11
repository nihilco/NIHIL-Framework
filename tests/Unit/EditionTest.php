<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EditionTest extends TestCase
{
    use Databasetransactions;

    protected $edition;
    
    public function setUp()
    {
        parent::setUp();

        $this->edition = create('App\Models\Edition');
    }

    public function test_a_edition_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->edition->creator);
    }    
}