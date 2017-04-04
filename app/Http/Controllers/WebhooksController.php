<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Customer;
use App\Payment;

class WebhooksController extends Controller
{
    //
    public function handle()
    {
        $payload = request()->all();

        if($account = Account::find(constant('NF_ACCOUNT_ID'))) {
            \Stripe\Stripe::setApiKey(\Crypt::decrypt($account->secret_key));
        }else{
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        }

        // If Stripe test event id
        if($payload['id'] == 'evt_00000000000000') {
            return response('Test webhook received.  Thanks Stripe!');
        }

        // If real Stripe event
        if($event = \Stripe\Event::retrieve($payload['id'])) {
            $method = $this->eventToMethod($payload['type']);
            
            if(method_exists($this, $method)) {
                $this->$method($payload);
                return response('Webhook received.  Action taken.  Thanks Stripe!');
            }

            return response('Webhook received.  No action taken.  Thanks Stripe!');
        }

        // Else NOT Stripe
        return response('You are not Stripe, go away!');
    }

    public function whenInvoicePaymentSucceeded($payload)
    {
        $customer = Customer::byStripeId($payload['data']['object']['customer']);

        $payment = Payment::create([
            'account_id' => $customer->account_id,
            'customer_id' => $customer->id,
            'invoice_id' => 1,
            'stripe_id' => $payload['data']['object']['charge'],
            'amount' => $payload['data']['object']['amount_due'],
        ]);
    }

    public function whenInvoicePaymentFailed($payload)
    {
        // log attempt
        // if over X attempts, cancel subscription
        // email customer
    }

    //
    protected function eventToMethod($event)
    {
        return 'when' . studly_case(str_replace('.', '_', $event));
    }

    //
    protected function retreiveCustomer($payload)
    {
        return Customer::byStripeId(
            $payload['data']['object']['customer']
        );
    }
}
