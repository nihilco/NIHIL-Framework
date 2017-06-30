<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \NIHILCo\Forums\Models\Forum::class => \NIHILCo\Forums\Policies\ForumPolicy::class,
        \NIHILCo\Forums\Models\Thread::class => \NIHILCo\Forums\Policies\ThreadPolicy::class,
        \NIHILCo\Forums\Models\Reply::class => \NIHILCo\Forums\Policies\ReplyPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
