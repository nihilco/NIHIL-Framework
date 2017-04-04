<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id');
            $table->integer('customer_id');
            $table->integer('plan_id');
            $table->string('stripe_id');
            $table->integer('number_of_terms')->deafult(0);;
            $table->integer('end_after_terms')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamp('renewed_at')->nullable();
            $table->timestamp('expires_at')->nullable();
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
        Schema::dropIfExists('subscriptions');
    }
}
