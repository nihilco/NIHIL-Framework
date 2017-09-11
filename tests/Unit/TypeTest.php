<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeTest extends TestCase
{
    use Databasetransactions;

    protected $type;
    
    public function setUp()
    {
        parent::setUp();

        $this->type = create('App\Models\Type');
    }

    public function test_a_type_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->type->creator);
    }

    public function test_a_type_has_a_parent()
    {
        $result = false;
        if(($this->type->parent == null) || (get_class($this->type->parent) == 'App\Models\Type')) {
            $result = true;
        }

        $this->assertTrue($result);
    }
    
}