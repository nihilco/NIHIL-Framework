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
        'App\Models\Account' => 'App\Policies\AccountPolicy',
        'App\Models\Activity' => 'App\Policies\ActivityPolicy',
        'App\Models\Category' => 'App\Policies\CategoryPolicy',
        'App\Models\Country' => 'App\Policies\CountryPolicy',
        'App\Models\Currency' => 'App\Policies\CurrencyPolicy',
        'App\Models\Customer' => 'App\Policies\CustomerPolicy',
        'App\Models\Email' => 'App\Policies\EmailPolicy',
        'App\Models\Exception' => 'App\Policies\ExceptionPolicy',
        'App\Models\Favorite' => 'App\Policies\FavoritePolicy',
        'App\Models\Forum' => 'App\Policies\ForumPolicy',
        'App\Models\Group' => 'App\Policies\GroupPolicy',
        'App\Models\Invoice' => 'App\Policies\InvoicePolicy',
        'App\Models\Issue' => 'App\Policies\IssuePolicy',
        'App\Models\Link' => 'App\Policies\LinkPolicy',
        'App\Models\Order' => 'App\Policies\OrderPolicy',
        'App\Models\Page' => 'App\Policies\PagePolicy',
        'App\Models\Password' => 'App\Policies\PasswordPolicy',
        'App\Models\Payment' => 'App\Policies\PaymentPolicy',
        'App\Models\Plan' => 'App\Policies\PlanPolicy',
        'App\Models\Post' => 'App\Policies\PostPolicy',
        'App\Models\Priority' => 'App\Policies\PriorityPolicy',
        'App\Models\Product' => 'App\Policies\ProductPolicy',
        'App\Models\Rating' => 'App\Policies\RatingPolicy',
        'App\Models\Reply' => 'App\Policies\ReplyPolicy',
        'App\Models\Resolution' => 'App\Policies\ResolutionPolicy',
        'App\Models\Session' => 'App\Policies\SessionPolicy',
        'App\Models\Source' => 'App\Policies\SourcePolicy',
        'App\Models\State' => 'App\Policies\StatePolicy',
        'App\Models\Status' => 'App\Policies\StatusPolicy',
        'App\Models\Subscription' => 'App\Policies\SubscriptionPolicy',
        'App\Models\Tag' => 'App\Policies\TagPolicy',
        'App\Models\Theme' => 'App\Policies\ThemePolicy',
        'App\Models\Thread' => 'App\Policies\ThreadPolicy',
        'App\Models\Transaction' => 'App\Policies\TransactionPolicy',
        'App\Models\Type' => 'App\Policies\TypePolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
        'App\Models\Vote' => 'App\Policies\VotePolicy',
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
