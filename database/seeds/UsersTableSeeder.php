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
        //DB::table('users')->insert([
        //    'name' => 'Testing Tester',
        //    'email' => 'testing@testing.test',
        //    'password' => bcrypt('secret'),
        //    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        //    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        //]);

        //
        DB::table('users')->insert([
            'name' => env('DB_SEED_USER_NAME'),
            'username' => env('DB_SEED_USER_USERNAME'),
            'email' => env('DB_SEED_USER_EMAIL'),
            'password' => bcrypt(env('DB_SEED_USER_PASSWORD')),
            'tos_acceptance_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        //
        //DB::table('users')->insert([
        //    'name' => 'Taraloka Test',
        //    'email' => 'test@taraloka.org',
        //    'password' => bcrypt('taraloka'),
        //    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        //    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        //]);
    }
}
