<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //factory(App\User::class, 5)->create()->each(function ($u) {
        //    $u->posts()->save(factory(App\Post::class)->make());
        //});

        //
        DB::table('users')->insert([
            'name' => 'Testing Tester',
            'email' => 'testing@testing.test',
            'password' => bcrypt('secret'),
            'stripe_id' => 'cus_00000000000000',
        ]);

        //
        DB::table('users')->insert([
            'name' => env('DB_SEED_USER_NAME'),
            'email' => env('DB_SEED_USER_EMAIL'),
            'password' => bcrypt(env('DB_SEED_USER_PASSWORD')),
        ]);

        User::byEmail(env('DB_SEED_USER_EMAIL'))->createStripeCustomerId();

        DB::table('users')->insert([
            'name' => 'Taraloka Test',
            'email' => 'test@taraloka.org',
            'password' => bcrypt('taraloka'),
        ]);

    }
}
