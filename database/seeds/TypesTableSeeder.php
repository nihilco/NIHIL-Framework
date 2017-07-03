<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('types')->insert([
            //
            // ISSUE TYPES
            //
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Bug',
                'slug' => 'bug',
                'description' => 'This is an issue which impairs or prevents the function of the product.',
                'resource_type' => App\Models\Issue::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Improvement',
                'slug' => 'improvement',
                'description' => 'This could be an improvement or enhancement to an existing feature or task.',
                'resource_type' => App\Models\Issue::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Epic Story',
                'slug' => 'epic-story',
                'description' => 'This issue is too big and elaborate to handle as is; it needs to be broken down into individual parts.',
                'resource_type' => App\Models\Issue::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Story',
                'slug' => 'story',
                'description' => 'This is an issue where there are a distinct order, or collection, of events which lead to a particular problem.',
                'resource_type' => App\Models\Issue::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Task',
                'slug' => 'task',
                'description' => 'Action that needs to be performed or executed not necessarily to fix a problem, but more to better a piece of the whole.',
                'resource_type' => App\Models\Issue::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Technical',
                'slug' => 'technical',
                'description' => 'A technical task.',
                'resource_type' => App\Models\Issue::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'New Feature',
                'slug' => 'new-feature',
                'description' => 'Take this idea and run with it; we want something completely new here.',
                'resource_type' => App\Models\Issue::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
                        [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Ticket',
                'slug' => 'ticket',
                'description' => 'Interaction with a user to address an issue result in a ticket.',
                'resource_type' => App\Models\Issue::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            //
            // INVOICE TYPES
            //
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Quote',
                'slug' => 'quote',
                'description' => 'Quotes are general estimates for requested products/services. It is non-binding, but will be our best guess',
                'resource_type' => App\Models\Invoice::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Estimate',
                'slug' => 'estimate',
                'description' => 'Estimates are just that, estimates for requested services/products.  They are binding and will be accepted for a specified term.',
                'resource_type' => App\Models\Invoice::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Invoice',
                'slug' => 'invoice',
                'description' => 'Invoices are a list of goods sent or services provided, with a statement of the sum due for these; a bill.',
                'resource_type' => App\Models\Invoice::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Donation Receipt',
                'slug' => 'donation-receipt',
                'description' => 'Donation Receipts are statements listing the total contribution, removing any costs of goods received, for tax purposes.',
                'resource_type' => App\Models\Invoice::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            //
            //  SOURCE TYPES
            //
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Stripe Account',
                'slug' => 'stripe-account',
                'description' => 'Stripe Account source type.',
                'resource_type' => App\Models\Source::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Bank Account',
                'slug' => 'bank-account',
                'description' => 'Bank account source type.',
                'resource_type' => App\Models\Source::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Credit Card',
                'slug' => 'credit-card',
                'description' => 'Credit card source type.',
                'resource_type' => App\Models\Source::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Debit Card',
                'slug' => 'debit-card',
                'description' => 'Debit card source type.',
                'resource_type' => App\Models\Source::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Bitcoin',
                'slug' => 'bitcoin',
                'description' => 'Bitcount source type.',
                'resource_type' => App\Models\Source::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Check',
                'slug' => 'check',
                'description' => 'Check source type.',
                'resource_type' => App\Models\Source::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Cash',
                'slug' => 'cash',
                'description' => 'Cash source type.',
                'resource_type' => App\Models\Source::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            //
            // TRANSACTION TYPES
            //
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Payment',
                'slug' => 'payment',
                'description' => 'Payment transaction type.',
                'resource_type' => App\Models\Transaction::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Refund',
                'slug' => 'refund',
                'description' => 'Refund transaction type.',
                'resource_type' => App\Models\Transaction::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Fee',
                'slug' => 'fee',
                'description' => 'Fee transaction type.',
                'resource_type' => App\Models\Transaction::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Transfer',
                'slug' => 'transfer',
                'description' => 'Transfer transaction type.',
                'resource_type' => App\Models\Transaction::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'user_id' => 1,
                'name' => 'Payout',
                'slug' => 'payout',
                'description' => 'Payout transaction type.',
                'resource_type' => App\Models\Transaction::class,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
