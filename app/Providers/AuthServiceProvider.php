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
        App\Models\Account::class => App\Policies\AccountPolicy::class,
        App\Models\BankAccount::class => App\Policies\BankAccountPolicy::class,
        App\Models\Category::class => App\Policies\CategoryPolicy::class,
        App\Models\CreditCard::class => App\Policies\CreditCardPolicy::class,
        App\Models\Customer::class => App\Policies\CustomerPolicy::class,
        App\Models\Email::class => App\Policies\EmailPolicy::class,
        App\Models\Exception::class => App\Policies\ExceptionPolicy::class,
        App\Models\Favorite::class => App\Policies\FavoritePolicy::class,
        App\Models\Forum::class => App\Policies\ForumPolicy::class,
        App\Models\Invoice::class => App\Policies\InvoicePolicy::class,
        App\Models\Issue::class => App\Policies\IssuePolicy::class,
        App\Models\LineItem::class => App\Policies\LineItemPolicy::class,
        App\Models\Link::class => App\Policies\LinkPolicy::class,
        App\Models\Order::class => App\Policies\OrderPolicy::class,
        App\Models\Page::class => App\Policies\PagePolicy::class,
        App\Models\Password::class => App\Policies\PasswordPolicy::class,
        App\Models\Payment::class => App\Policies\PaymentPolicy::class,
        App\Models\Plan::class => App\Policies\PlanPolicy::class,
        App\Models\Post::class => App\Policies\PostPolicy::class,
        App\Models\Priority::class => App\Policies\PriorityPolicy::class,
        App\Models\Rating::class => App\Policies\RatingPolicy::class,
        App\Models\Reply::class => App\Policies\ReplyPolicy::class,
        App\Models\Resolution::class => App\Policies\ResolutionPolicy::class,
        App\Models\Status::class => App\Policies\StatusPolicy::class,
        App\Models\Subscription::class => App\Policies\SubscriptionPolicy::class,
        App\Models\Tag::class => App\Policies\TagPolicy::class,
        App\Models\Theme::class => App\Policies\ThemePolicy::class,
        App\Models\Thread::class => App\Policies\ThreadPolicy::class,
        App\Models\Transaction::class => App\Policies\TransactionPolicy::class,
        App\Models\Type::class => App\Policies\TypePolicy::class,
        App\Models\User::class => App\Policies\UserPolicy::class,
        App\Models\Vote::class => App\Policies\VotePolicy::class,
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
