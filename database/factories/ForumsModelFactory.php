<?php

/**
 *
 *
 **/
$factory->define(NIHILCo\Forums\Models\Forum::class, function (Faker\Generator $faker) {

    $title = $faker->words(2);
    
    return [
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
        'title' => implode(" ", $title),
        'slug' => implode("-", $title),
        'description' => $faker->paragraph,
    ];
});

$factory->define(NIHILCo\Forums\Models\Thread::class, function (Faker\Generator $faker) {

    $title = $faker->words(rand(2,5));
    
    return [
        'forum_id' => function () {
            return factory('NIHILCo\Forums\Models\Forum')->create()->id;
        },
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
        'title' => implode(" ", $title),
        'slug' => implode("-", $title),
        'body' => $faker->paragraph,
        'votes_up' => rand(0, 1000),
        'votes_down' => rand(0,1000),
    ];
});

$factory->define(NIHILCo\Forums\Models\Reply::class, function (Faker\Generator $faker) {
    return [
        'thread_id' => function () {
            return factory('NIHILCo\Forums\Models\Thread')->create()->id;
        },
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
        'body' => $faker->paragraph,
        'votes_up' => rand(0, 1000),
        'votes_down' => rand(0,1000)
    ];
});

$factory->define(NIHILCo\Forums\Models\Vote::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
        'resource_id' => 1,
        'resource_type' => rand(0,1) ? 'thread' : 'reply',
        'vote' => rand(0,1) ? 'up' : 'down',
    ];
});