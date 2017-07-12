<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use Databasetransactions;

    protected $user;
    
    public function setUp()
    {
        parent::setUp();

        $this->user = create('App\Models\User');
    }

    public function test_user_has_accounts()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->accounts);
    }

    public function test_user_has_activities()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->activities);
    }

    public function test_user_has_categories()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->categories);
    }
   
    public function test_user_has_countries()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->countries);
    }
   
    public function test_user_has_currencies()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->currencies);
    }
   
    public function test_user_has_customers()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->customers);
    }
   
    public function test_user_has_emails()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->emails);
    }
   
    public function test_user_has_exceptions()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->exceptions);
    }
   
    public function test_user_has_favorites()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->favorites);
    }
   
    public function test_user_has_forums()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->forums);
    }
   
    public function test_user_has_groups()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->groups);
    }
   
    public function test_user_has_invoices()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->invoices);
    }
   
    public function test_user_has_invoice_items()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->invoiceItems);
    }
   
    public function test_user_has_issues()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->issues);
    }
   
    public function test_user_has_links()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->links);
    }
   
    public function test_user_has_orders()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->orders);
    }
   
    public function test_user_has_pages()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->pages);
    }
   
    public function test_user_has_payments()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->payments);
    }
   
    public function test_user_has_plans()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->plans);
    }
   
    public function test_user_has_posts()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->posts);
    }
   
    public function test_user_has_priorities()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->priorities);
    }
   
    public function test_user_has_products()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->products);
    }
   
    public function test_user_has_ratings()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->ratings);
    }
   
    public function test_user_has_replies()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->replies);
    }
   
    public function test_user_has_resolutions()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->resolutions);
    }
   
    public function test_user_has_sources()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->sources);
    }
   
    public function test_user_has_states()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->states);
    }
   
    public function test_user_has_statuses()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->statuses);
    }
   
    public function test_user_has_subscriptions()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->subscriptions);
    }
   
    public function test_user_has_tags()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->tags);
    }
   
    public function test_user_has_themes()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->themes);
    }
   
    public function test_user_has_threads()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->threads);
    }
   
    public function test_user_has_types()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->types);
    }
   
    public function test_user_has_votes()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->votes);
    }
   
}