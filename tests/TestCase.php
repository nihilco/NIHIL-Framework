<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected static $migrationsRun = false;
    
    public function setUp()
    {
        parent::setUp();

        if (!static::$migrationsRun) {
            \Artisan::call('migrate');
            static::$migrationsRun = true;
        }
        
    }

    public function signIn($class = 'App\User', $overrides = [])
    {
        $user = create($class, $overrides);
        $this->actingAs($user);
        return $this;
    }
}
