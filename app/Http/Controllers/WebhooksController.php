<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Account;
use App\Models\Customer;

class WebhooksController extends Controller
{
    private $account_endpoint_secret;
    private $connect_endpoint_secret;

    public function __construct()
    {
        if(!$this->isInTestingEnvironment()) {
            $this->account_endpoint_secret = '';
            $this->connect_endpoint_secret = '';
        } else {
            $this->account_endpoint_secret = 'whsec_E4qgmChoKKxnJcvDLnQJvj5OjmZEIZzK';
            $this->connect_endpoint_secret = 'whsec_nluUTKOAytKD5s6N5zM5fP1Du3SWpaDt';
        }
    }
    
    /**
     * Handle a Stripe webhook call.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handleStripeWebhook(Request $request)
    {
      $payload = $this->getPayload($request);

      if (!$this->eventExistsOnStripe($request)) {
        return;
      }

      $method = $this->eventToMethod($payload['type']);

      if (method_exists($this, $method)) {
        return $this->{$method}($payload);
      } else {
        return $this->missingMethod(['type' => $method]);
      }
    }
    
    /**
     * Handle a cancelled customer from a Stripe subscription.
     *
     * @param  array  $payload
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function whenCustomerSubscriptionDeleted(array $payload)
    {
      $customer = $this->getCustomerByStripeId($payload['data']['object']['customer']);

      if ($customer) {
        $customer->subscriptions->filter(function ($subscription) use ($payload) {
          return $subscription->stripe_id === $payload['data']['object']['id'];
        })->each(function ($subscription) {
          $subscription->markAsCancelled();
        });
      }
        
      return response()->json([
          'created' => time(),
          'mode' => 'test',
          'event' => __FUNCTION__,
          'message' => 'Webhook handled.',
      ], 200);
    }

    protected function whenInvoicePaymentSucceeded(array $payload)
    {

    }

    protected function whenInvoicePaymentFailed(array $payload)
    {

    }

    // protected function when(array $payload)
    //{
    //
    //}

    /**
     * Get the billable entity instance by Stripe ID.
     *
     * @param  string  $stripeId
     * @return \Laravel\Cashier\Billable
     */
    protected function getCustomerByStripeId($stripeId)
    {
      return Customer::where('stripe_id', $stripeId)->first();
    }

    /**
     * Verify with Stripe that the event is genuine.
     *
     * @param  string  $id
     * @return bool
     */
    protected function eventExistsOnStripe($request)
    {
      $payload = $this->getPayload($request);
      $sig_header = $request->header('HTTP_STRIPE_SIGNATURE');

      try {
        if(!$this->isInTestingEnvironment()) {
          return ! is_null(\Stripe\Webhook::constructEvent(
            $payload, $sig_header, $this->account_endpoint_secret
          ));            
        } else {
          return $payload['id'] === 'evt_00000000000000';
        }
      } catch(\UnexpectedValueException $e) {
        return response()->json([
          'created' => time(),
          'mode' => 'test',
          'event' => $this->eventToMethod($payload['type']),
          'message' => 'Error: Unexpected value.',
        ], 500);
      } catch(\Stripe\Error\SignatureVerification $e) {
        return response()->json([
          'created' => time(),
          'mode' => 'test',
          'event' => $this->eventToMethod($payload['type']),
          'message' => 'Error: Signature Verification.',
        ], 500);
      }catch (Exception $e) {
        return response()->json([
          'created' => time(),
          'mode' => 'test',
          'event' => $this->eventToMethod($payload['type']),
          'message' => 'Error: Unknown event.',
        ], 500);
      }
    }

    protected function eventToMethod($event)
    {
        return 'when' . studly_case(str_replace('.', '_', $event));
    }

    protected function getPayload($request)
    {
      return json_decode($request->getContent(), true);
    }

    /**
     * Verify if cashier is in the testing environment.
     *
     * @return bool
     */
    protected function isInTestingEnvironment()
    {
      return true;
    }

    /**
     * Handle calls to missing methods on the controller.
     *
     * @param  array  $parameters
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function missingMethod($parameters = [])
    {
        return response()->json([
          'created' => time(),
          'mode' => 'test',
          'event' => $parameters['type'],
          'message' => 'Webhook handled.',
        ], 200);
    }
}