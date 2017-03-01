<?php

namespace App\Billing;

class Stripe
{
    public $mode;
    public $publishableKey;
    protected $secretKey;
    protected $accountId;

    public function __construct($m, $p, $s, $a = null)
    {
        $this->mode = $m;
        $this->publishableKey = $p;
        $this->secretKey = $s;
        if($a) {
            $this->accountId = $a;
        }
    }
}