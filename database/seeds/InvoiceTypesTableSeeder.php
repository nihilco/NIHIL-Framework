<?php

use Illuminate\Database\Seeder;

class InvoiceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('invoice_types')->insert([
            [
                'name' => 'Quote',
                'slug' => 'quote',
                'description' => 'Quotes are general estimates for requested products/services. It is non-binding, but will be our best guess',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Estimate',
                'slug' => 'estimate',
                'description' => 'Estimates are just that, estimates for requested services/products.  They are binding and will be accepted for a specified term.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Invoice',
                'slug' => 'invoice',
                'description' => 'Invoices are a list of goods sent or services provided, with a statement of the sum due for these; a bill.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Donation Receipt',
                'slug' => 'donation-receipt',
                'description' => 'Donation Receipts are statements listing the total contribution, removing any costs of goods received, for tax purposes.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
