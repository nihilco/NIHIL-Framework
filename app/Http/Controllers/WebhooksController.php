<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhooksController extends Controller
{
    //
    public function handle()
    {
        $payload = request()->all();

        // Check for stripe id
        // confirm id is with stripe

        $method = $this->eventToMethod($payload['type']);
        
        if(method_exists($this, $method)) {
            $this->$method($payload);
        }

        return response('Webhook Received.  Thanks Stripe!');
    }

    public function whenCustomerSubscriptionDeleted($payload)
    {
        User::byStribeId(
            $payload['data']['object']['customer']
        )->deactivate();
    }

    public function whenChargeSucceeded($payload)
    {
        $this->retreiveUser($payload)
             ->payments()
             ->create([
                 'amount' => $payload['data']['object']['amount'],
                 'charge_id' => $payload['data']['object']['id'],
             ]);
    }

    protected function eventToMethod($event)
    {
        studly_case(str_replace('.', '_', $event));
    }

    protected function retreiveUser($payload)
    {
        return User::byStripeId(
            $payload['data']['object']['customer']
        );
    }
}
