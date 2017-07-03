<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\WebhooksController;

class WebhooksControllerTest extends TestCase
{
    use DatabaseTransactions;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    /*
    public function it_converts_a_stripe_event_name_to_a_method_name()
    {
        $name = (new WebhooksController)->eventToMethod('customer.subscription.deleted');
        $this->assertEquals('whenCustomerSubscriptionDeleted', $name);
    }

    public function it_deactivates_a_user_subscription_if_deleted_on_stripes_end()
    {
        $user = factory('App\Models\User')->create([
            'stripe_id' => 'fake_stripe_id'
        ]);
    
        $this->post('stripe/webhooks', [
            'type' => 'customer.subscription.deleted',
            'data' => [
                'object' => [
                    'customer' => $user->stripe_id
                ]
            ]
        ]);
    
        $this->assertFalse($user->fresh()->subscriptions);
    }
    */
}
