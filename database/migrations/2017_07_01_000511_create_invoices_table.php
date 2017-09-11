<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('creator_id')->index();
            $table->unsignedInteger('account_id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('billing_address_id');
            $table->unsignedInteger('shipping_address_id');
            $table->string('slug', 50)->unique();
            $table->integer('subtotal');
            $table->decimal('tax_rate');
            $table->integer('tax');
            $table->integer('shipping_total');
            $table->integer('total');
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('viewed_at')->nullable();
            $table->timestamp('due_at')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->text('comments')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
