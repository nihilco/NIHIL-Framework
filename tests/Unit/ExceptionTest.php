<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExceptionTest extends TestCase
{
    use Databasetransactions;

    protected $exception;
    
    public function setUp()
    {
        parent::setUp();

        $this->exception = create('App\Models\Exception');
    }

    public function test_an_exception_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->exception->creator);
    }

    public function test_an_exception_has_a_parent()
    {
        $result = false;
        if(($this->exception->parent == null) || (get_class($this->exception->parent) == 'App\Models\Exception')) {
            $result = true;
        }

        $this->assertTrue($result);

    }
    
}