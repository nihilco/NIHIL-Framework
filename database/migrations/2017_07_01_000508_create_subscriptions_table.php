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
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('account_id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('plan_id');
            $table->string('stripe_id');
            $table->unsignedInteger('number_of_terms')->deafult(0);;
            $table->unsignedInteger('end_after_terms')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamp('renewed_at')->nullable();
            $table->timestamp('expires_at')->nullable();
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
        Schema::dropIfExists('subscriptions');
    }
}
