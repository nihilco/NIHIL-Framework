<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IssueTest extends TestCase
{
    use Databasetransactions;

    protected $issue;
    
    public function setUp()
    {
        parent::setUp();

        $this->issue = create('App\Models\Issue');
    }

    public function test_an_issue_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->issue->creator);
    }

    public function test_an_issue_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->issue->user);
    }

    public function test_an_issue_has_a_type()
    {
        $this->assertInstanceOf('App\Models\Type', $this->issue->type);
    }

    public function test_an_issue_has_a_priority()
    {
        $this->assertInstanceOf('App\Models\Priority', $this->issue->priority);
    }

    public function test_an_issue_has_a_status()
    {
        $this->assertInstanceOf('App\Models\Status', $this->issue->status);
    }

    public function test_an_issue_has_a_resolution()
    {
        $this->assertInstanceOf('App\Models\Resolution', $this->issue->resolution);
    }
    
}