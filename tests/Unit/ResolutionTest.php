<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResolutionTest extends TestCase
{
    use Databasetransactions;

    protected $resolution;
    
    public function setUp()
    {
        parent::setUp();

        $this->resolution = create('App\Models\Resolution');
    }

    public function test_a_resolution_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->resolution->user);
    }

    public function test_a_resolution_has_issues()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->resolution->issues);
    }
    
}