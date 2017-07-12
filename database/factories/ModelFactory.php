<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Account::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'country_id' => function() {
            return factory('App\Models\Country')->create()->id;
        },
        'mode' => 'test',
        'name' => $faker->sentence(rand(1,2)),
        'description' => $faker->paragraph,
        'stripe_id' => 'acct_0000000000000000',
        'publishable_key' => 'pk_test_00000000000000000000000',
        'secret_key' => 'sk_test_000000000000000000000000',
        'description' => $faker->paragraph,
        'managed' => true,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Activity::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'resource_id' => 0,
        'resource_type' => App\Models\Forum::class,
        'action' => 'test.action',
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'parent_id' => function() {
            // 5% of the time add parent category
            if(rand(1,100) <= 5) {
                return factory('App\Models\Category')->create()->id;
            }else {
                return null;
            }
        },
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'name' => $faker->sentence(rand(1,2)),
        'slug' => $faker->slug,
        'description' => $faker->paragraph,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Country::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'name' => $faker->country,
        'slug' => $faker->slug,
        'abbr' => $faker->countryCode,
        'description' => $faker->paragraph,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Currency::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'name' => $faker->sentence(rand(1,2)),
        'slug' => $faker->slug,
        'code' => $faker->currencyCode,
        'description' => $faker->paragraph,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Customer::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'account_id' => function() {
            return factory('App\Models\Account')->create()->id;
        },
        'stripe_id' => 'cus_00000000000000',
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Email::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'key' => $faker->md5,
        'to' => $faker->email,
        'from' => $faker->email,
        'subject' => $faker->sentence(rand(1,2)),
        'text' => $faker->paragraph,
        'html' => $faker->paragraph,
        'raw' => $faker->paragraph(2),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Exception::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'parent_id' => function() {
            if(rand(1,100) <= 10) {
                return factory('App\Models\Exception')->create()->id;
            } else {
                return null;
            }
        },
        'message' => $faker->sentence(rand(1,10)),
        'stacktrace' => $faker->paragraph,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Favorite::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'resource_id' => 0,
        'resource_type' => App\Models\Forum::class,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Forum::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'title' => $faker->sentence(rand(2,3)),
        'slug' => $faker->slug,
        'description' => $faker->paragraph,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Group::class, function (Faker\Generator $faker) {
    return [
        'parent_id' => function() {
            if(rand(1,100) <= 5) {
                return factory('App\Models\User')->create()->id;
            } else {
                return null;
            }
        },
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },        
        'name' => $faker->sentence(rand(1,2)),
        'slug' => $faker->slug,
        'color' => $faker->hexcolor,
        'description' => $faker->paragraph,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Invoice::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'account_id' => function() {
            return factory('App\Models\Account')->create()->id;
        },
        'customer_id' => function() {
            return factory('App\Models\Customer')->create()->id;
        },
        'key' => $faker->md5,
        'subtotal' => rand(1,1000000),
        'tax_rate' => rand(1,250) / 10,
        'tax' => rand(1,1000),
        'shipping_total' => rand(1,1000),
        'total' => rand(1,1000000),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\InvoiceItem::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'invoice_id' => function() {
            return factory('App\Models\Invoice')->create()->id;
        },
        'name' => $faker->sentence(rand(1,4)),
        'description' => $faker->paragraph,
        'quantity' => rand(1,12),
        'unit_price' => rand(1,10000),
        'subtotal' => rand(100,100000),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Issue::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'type_id' => function() {
            return factory('App\Models\Type')->create(['resource_type' => App\Models\Issue::class])->id;
        },
        'priority_id' => function() {
            return factory('App\Models\Priority')->create()->id;
        },
        'status_id' => function() {
            return factory('App\Models\Status')->create()->id;
        },
        'resolution_id' => function() {
            return factory('App\Models\Resolution')->create()->id;
        },
        'title' => $faker->sentence(rand(1,5)),
        'slug' => $faker->slug,
        'assignee_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'description' => $faker->paragraph,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Link::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'label' => $faker->sentence(rand(1,5)),
        'uses' => function() {
            if(rand(1,100) <= 25) {
                return rand(1,10);
            } else {
                return null;
            }
        },
        'destination' => $faker->url,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Order::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'account_id' => function() {
            return factory('App\Models\Account')->create()->id;
        },
        'customer_id' => function() {
            return factory('App\Models\Customer')->create()->id;
        },
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Page::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'title' => $faker->sentence(rand(1,2)),
        'slug' => $faker->slug,
        'description' => $faker->paragraph,
        'content' => $faker->paragraph,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PasswordReset::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->email,
        'token' => $faker->md5,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Payment::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'account_id' => function() {
            return factory('App\Models\Account')->create()->id;
        },
        'customer_id' => function() {
            return factory('App\Models\Customer')->create()->id;
        },
        'invoice_id' => function() {
            return factory('App\Models\Invoice')->create()->id;
        },
        'stripe_id' => 'ch_000000000000000000000000',
        'amount' => rand(100,1000000),
        'comments' => $faker->paragraph,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Plan::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'account_id' => function() {
            return factory('App\Models\Account')->create()->id;
        },
        'currency_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'name' => $faker->sentence(rand(1,2)),
        'slug' => $faker->slug,
        'description' => $faker->paragraph,
        'amount' => rand(100,10000),
        'interval' => array_rand(['day', 'week', 'month', 'year']),
        'interval_count' => 1,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {

    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'title' => $faker->sentence(5, true),
        'slug' => $faker->slug,
        'description' => $faker->paragraph(1, true),
        'content' => $faker->paragraph(3, true),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Priority::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'name' => $faker->sentence(rand(1,2)),
        'slug' => $faker->slug,
        'description' => $faker->paragraph,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'account_id' => function() {
            return factory('App\Models\Account')->create()->id;
        },
        'name' => $faker->sentence(rand(1,2)),
        'slug' => $faker->slug,
        'description' => $faker->paragraph,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Rating::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'rating' => rand (10, 100) / 10,
        'resource_id' => 0,
        'resource_type' => App\Models\Forum::class,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Reply::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'content' => $faker->paragraph,
        'resource_id' => 0,
        'resource_type' => App\Models\Forum::class,        
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Resolution::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'name' => $faker->sentence(rand(1,2)),
        'slug' => $faker->slug,
        'description' => $faker->paragraph,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Session::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->unique()->md5,
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'ip_address' => $faker->ipv4,
        'user_agent' => $faker->userAgent,
        'payload' => $faker->paragraph,
        'last_activity' => $faker->unixtime,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Source::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'account_id' => function() {
            return factory('App\Models\Account')->create()->id;
        },
        'customer_id' => function() {
            return factory('App\Models\Customer')->create()->id;
        },
        'type_id' => function() {
            return factory('App\Models\Type')->create(['resource_type' => App\Models\Source::class])->id;
        },
        'stripe_id' => 'cus_00000000000000',
        'fingerprint' => $faker->md5,
        'nickname' => $faker->sentence(rand(1,3)),
        'reference_number' => '0000',
        'default' => false,
        'active' => true,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\State::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'country_id' => function() {
            return factory('App\Models\Country')->create()->id;
        },
        'name' => $faker->state,
        'abbr' => $faker->stateAbbr,
        'description' => $faker->paragraph,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Status::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'name' => $faker->sentence(rand(1,2)),
        'slug' => $faker->slug,
        'description' => $faker->paragraph,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Subscription::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'account_id' => function() {
            return factory('App\Models\Account')->create()->id;
        },
        'customer_id' => function() {
            return factory('App\Models\Customer')->create()->id;
        },
        'plan_id' => function() {
            return factory('App\Models\Plan')->create()->id;
        },
        'stripe_id' => 'sub_00000000000000',
        'number_of_terms' => rand(0,36),
        'end_after_terms' => function() {
            if(rand(1,100) <= 25) {
                return rand(1,72);
            } else {
                return null;
            }
        },
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'name' => $faker->sentence(rand(1,3)),
        'slug' => $faker->slug,
        'description' => $faker->paragraph,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Theme::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'name' => $faker->sentence(rand(1,2)),
        'slug' => $faker->slug,
        'description' => $faker->paragraph,
        'active' => false,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Thread::class, function (Faker\Generator $faker) {
    return [
        'forum_id' => function () {
            return factory('App\Models\Forum')->create()->id;
        },
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'title' => $faker->sentence(rand(2,4)),
        'slug' => $faker->slug,
        'body' => $faker->paragraph,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Transaction::class, function (Faker\Generator $faker) {
    return [
        'account_id' => function() {
            return factory('App\Models\Account')->create()->id;
        },
        'type_id' => function() {
            return factory('App\Models\Type')->create(['resource_type' => App\Models\Transaction::class])->id;
        },
        'from_source_id' => function() {
            return factory('App\Models\Source')->create()->id;
        },
        'to_source_id' => function() {
            return factory('App\Models\Source')->create()->id;
        },
        'amount' => rand(1,1000000),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Type::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'name' => $faker->sentence(rand(1,2)),
        'slug' => $faker->slug,
        'description' => $faker->paragraph,
        'resource_type' => App\Models\Issue::class,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Vote::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'resource_id' => 1,
        'resource_type' => App\Models\Thread::class,
        'vote' => rand(0,1) ? App\Models\Vote::VOTE_UP : App\Models\Vote::VOTE_DOWN,
    ];
});