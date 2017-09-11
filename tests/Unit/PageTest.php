<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PageTest extends TestCase
{
    use Databasetransactions;

    protected $page;
    
    public function setUp()
    {
        parent::setUp();

        $this->page = create('App\Models\Page');
    }

    public function test_a_page_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->page->creator);
    }
    
}