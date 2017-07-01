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
$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->sentence(5, true),
        'description' => $faker->paragraph(1, true),
        'content' => $faker->paragraph(3, true),
    ];
});

$factory->define(App\Models\Forum::class, function (Faker\Generator $faker) {

    $title = $faker->words(2);
    
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'title' => implode(" ", $title),
        'slug' => implode("-", $title),
        'description' => $faker->paragraph,
    ];
});

$factory->define(App\Models\Thread::class, function (Faker\Generator $faker) {

    $title = $faker->words(rand(2,5));
    
    return [
        'forum_id' => function () {
            return factory('App\Models\Forum')->create()->id;
        },
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'title' => implode(" ", $title),
        'slug' => implode("-", $title),
        'body' => $faker->paragraph,
    ];
});

$factory->define(App\Models\Reply::class, function (Faker\Generator $faker) {
    return [
        'thread_id' => function () {
            return factory('App\Models\Thread')->create()->id;
        },
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },

        'body' => $faker->paragraph,
    ];
});

$factory->define(App\Models\Vote::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\Models\User')->create()->id;
        },
        'resource_id' => 1,
        'resource_type' => rand(0,1) ? App\Models\Thread::class : App\Models\Reply::class,
        'vote' => rand(0,1) ? App\Models\Vote::VOTE_UP : App\Models\Vote::VOTE_DOWN,
    ];
});