<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(ResolutionsTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(PrioritiesTableSeeder::class);
        $this->call(InvoiceTypesTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(AccountsTableSeeder::class);
        $this->call(StripeDataSeeder::class);
    }
}
