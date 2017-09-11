<?php

use Illuminate\Database\Seeder;

class BillingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // TYPES
        //
        $quoteType = factory('App\Models\Type')->create([
            'parent_id' => null,
            'creator_id' => 1,
            'name' => 'Quote',
            'slug' => 'quote',
            'description' => 'Quotes are general estimates for requested products/services. It is non-binding, but will be our best guess',
            'resource_type' => App\Models\Invoice::class,
        ]);

        $estimateType = factory('App\Models\Type')->create([
            'parent_id' => null,
            'creator_id' => 1,
            'name' => 'Estimate',
            'slug' => 'estimate',
            'description' => 'Estimates are just that, estimates for requested services/products.  They are binding and will be accepted for a specified term.',
            'resource_type' => App\Models\Invoice::class,
        ]);

        $invoiceType = factory('App\Models\Type')->create([
            'parent_id' => null,
            'creator_id' => 1,
            'name' => 'Invoice',
            'slug' => 'invoice',
            'description' => 'Invoices are a list of goods sent or services provided, with a statement of the sum due for these; a bill.',
            'resource_type' => App\Models\Invoice::class,
        ]);
        
        $donationRecieptType = factory('App\Models\Type')->create([
            'parent_id' => null,
            'creator_id' => 1,
            'name' => 'Donation Receipt',
            'slug' => 'donation-receipt',
            'description' => 'Donation Receipts are statements listing the total contribution, removing any costs of goods received, for tax purposes.',
            'resource_type' => App\Models\Invoice::class,                                    
        ]);

        //
        // STATUSES
        //
        $currentStatus = factory('App\Models\Status')->create([
            'creator_id' => 1,
            'name' => 'Current',
            'slug' => 'current',
            'description' => 'This invoice is current.',
            'resource_type' => App\Models\Invoice::class,
        ]);

        $lateStatus = factory('App\Models\Status')->create([
            'creator_id' => 1,
            'name' => 'Late',
            'slug' => 'late',
            'description' => 'This invoice is late, within grace.',
            'resource_type' => App\Models\Invoice::class,
        ]);

        $overdueStatus = factory('App\Models\Status')->create([
            'creator_id' => 1,
            'name' => 'Overdue',
            'slug' => 'overdue',
            'description' => 'This invoice is overdue, beyond grace, acruing penalties.',
            'resource_type' => App\Models\Invoice::class,
        ]);

        $paidStatus = factory('App\Models\Status')->create([
            'creator_id' => 1,
            'name' => 'Paid',
            'slug' => 'paid',
            'description' => 'This invoice has been paid.',
            'resource_type' => App\Models\Invoice::class,
        ]);

        //
        // ADDRESSES
        //
        $bhAddress = factory('App\Models\Address')->create([
            'creator_id' => 1,
            'resource_id' => 3,
            'resource_type' => App\Models\Customer::class,
            'address1' => 'Ben Hollerbach',
            'address2' => '1121 Victoria Street NE',
            'city' => 'Brookhaven',
            'zipcode' => '30319',
            'postalcode' => '30319',
            'region_id' => 2,
            'country_id' => 1,
        ]);

        $htAddress = factory('App\Models\Address')->create([
            'creator_id' => 1,
            'resource_id' => 3,
            'resource_type' => App\Models\Customer::class,
            'address1' => 'Ben Hollerbach',
            'address2' => 'Hollerbach-Tompkins Co.',
            'address3' => '1121 Victoria Street NE',
            'city' => 'Brookhaven',
            'zipcode' => '30319',
            'postalcode' => '30319',
            'region_id' => 2,
            'country_id' => 1,
        ]);

        //
        // INVOICES
        //
        $invoice1 = factory('App\Models\Invoice')->create([
            'creator_id' => 1,
            'account_id' => 1,
            'customer_id' => 4,
            'type_id' => $invoiceType->id,
            'status_id' => $lateStatus->id,
            'billing_address_id' => $bhAddress->id,
            'shipping_address_id' => $bhAddress->id,
            'slug' => uniqid(),
            'subtotal' => 6016,
            'tax_rate' => 0,
            'tax' => 0,
            'shipping_total' => 0,
            'total' => 6016,
            'sent_at' => \Carbon\Carbon::createFromDate(2017, 5, 17, 'America/New_York'),
            'due_at' => \Carbon\Carbon::createFromDate(2017, 6, 17, 'America/New_York'),
        ]);

        $i1i1 = factory('App\Models\InvoiceItem')->create([
            'creator_id' => 1,
            'invoice_id' => $invoice1->id,
            'name' => '.CO Domain Name Registration',
            'description' => 'HOLLERBACH.CO - Expires 1/6/2018',
            'quantity' => 1,
            'unit_price' => 2999,
            'subtotal' => 2999,
        ]);

        $i1i2 = factory('App\Models\InvoiceItem')->create([
            'creator_id' => 1,
            'invoice_id' => $invoice1->id,
            'name' => '.COM Domain Name Registration',
            'description' => 'GAHICKORY.COM - Expires 5/17/2018',
            'quantity' => 1,
            'unit_price' => 1517,
            'subtotal' => 1517,
        ]);

        $i1i3 = factory('App\Models\InvoiceItem')->create([
            'creator_id' => 1,
            'invoice_id' => $invoice1->id,
            'name' =>'Basic Hosting Plan, annual',
            'description' => 'Expires 5/17/18',
            'quantity' => 1,
            'unit_price' => 6000,
            'subtotal' => 6000,
        ]);

        $i1i4 = factory('App\Models\InvoiceItem')->create([
            'creator_id' => 1,
            'invoice_id' => $invoice1->id,
            'name' => '&#34;From the Beginning&#34; Discount',
            'description' => 'Thanks for being with me from the beginning.',
            'quantity' => 1,
            'unit_price' => -4500,
            'subtotal' => -4500,
        ]);

        //
        $invoice2 = factory('App\Models\Invoice')->create([
            'creator_id' => 1,
            'account_id' => 1,
            'customer_id' => 4,
            'type_id' => $invoiceType->id,
            'status_id' => $lateStatus->id,
            'billing_address_id' => $htAddress->id,
            'shipping_address_id' => $htAddress->id,
            'slug' => uniqid(),
            'subtotal' => 7568,
            'tax_rate' => 0,
            'tax' => 0,
            'shipping_total' => 0,            
            'total' => 7568,
            'sent_at' => \Carbon\Carbon::createFromDate(2017, 5, 17, 'America/New_York'),
            'due_at' => \Carbon\Carbon::createFromDate(2017, 6, 17, 'America/New_York'),

        ]);

        $i2i1 = factory('App\Models\InvoiceItem')->create([
            'creator_id' => 1,
            'invoice_id' => $invoice2->id,
            'name' => '.COM Domain Name Registration',
            'description' => 'MAPLANTA.COM - Expires 9/26/2018',
            'quantity' => 1,
            'unit_price' => 1517,
            'subtotal' => 1517,
        ]);

        $i2i2 = factory('App\Models\InvoiceItem')->create([
            'creator_id' => 1,
            'invoice_id' => $invoice2->id,
            'name' => '.COM Domain Name Registration',
            'description' => 'HOLLERBACH-TOMPKINS.COM - Expires 11/9/2018',
            'quantity' => 1,
            'unit_price' => 1517,
            'subtotal' => 1517,
        ]);

        $i2i3 = factory('App\Models\InvoiceItem')->create([
            'creator_id' => 1,
            'invoice_id' => $invoice2->id,
            'name' => '.COM Domain Name Registration',
            'description' => 'WOODLEATHERAWESOME.COM - Expires 11/9/2018',
            'quantity' => 1,
            'unit_price' => 1517,
            'subtotal' => 1517,
        ]);

        $i2i4 = factory('App\Models\InvoiceItem')->create([
            'creator_id' => 1,
            'invoice_id' => $invoice2->id,
            'name' => '.COM Domain Name Registration',
            'description' => 'HANDTCO.COM - Expires 12/31/2018',
            'quantity' => 1,
            'unit_price' => 1517,
            'subtotal' => 1517, 
        ]);

        $i2i5 = factory('App\Models\InvoiceItem')->create([
            'creator_id' => 1,
            'invoice_id' => $invoice2->id,
            'name' =>'Basic Hosting Plan, annual',
            'description' => 'Expires 5/17/18',
            'quantity' => 1,
            'unit_price' => 6000,
            'subtotal' => 6000,
        ]);

        $i2i6 = factory('App\Models\InvoiceItem')->create([
            'creator_id' => 1,
            'invoice_id' => $invoice2->id,
            'name' => '&#34;From the Beginning&#34; Discount',
            'description' => 'Thanks for being with me from the beginning.',
            'quantity' => 1,
            'unit_price' => -4500,
            'subtotal' => -4500,
        ]);
    }
}
