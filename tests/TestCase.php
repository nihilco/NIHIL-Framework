<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseTransactions;

    protected static $migrationsRun = false;

    public function setUp()
    {
        parent::setUp();

        if (!static::$migrationsRun) {
            \Artisan::call('migrate');
            static::$migrationsRun = true;
        }

        \Session::start();
    }

    public function signIn($class = 'App\Models\User', $overrides = [])
    {
        if(isset($overrides['user'])) {
            $user = $overrides['user'];
        }else{
            $user = create($class, $overrides);
        }
        $this->actingAs($user);
        return $this;
    }
}
