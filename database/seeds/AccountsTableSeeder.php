<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('accounts')->insert([
            'user_id' => 2,
            'mode' => env('STRIPE_MODE'),
            'account_id' => env('STRIPE_ACCOUNT_ID'),
            'publishable_key' => env('STRIPE_PUBLISHABLE_KEY'),
            'secret_key' => \Crypt::encrypt(env('STRIPE_SECRET_KEY')),
            'description' => 'Stand alone account for The NIHIL Corporation.',
            'country_id' => 1,
            'managed' => false,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        //
        DB::table('accounts')->insert([
            'user_id' => 2,
            'mode' => env('TARALOKA_STRIPE_MODE'),
            'account_id' => env('TARALOKA_STRIPE_ACCOUNT_ID'),
            'publishable_key' => env('TARALOKA_STRIPE_PUBLISHABLE_KEY'),
            'secret_key' => \Crypt::encrypt(env('TARALOKA_STRIPE_SECRET_KEY')),
            'description' => 'Managed account for The Taraloka Foundation.',
            'country_id' => 1,
            'managed' => false,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
