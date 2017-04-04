<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id');
            $table->integer('customer_id');
            $table->string('stripe_id');
            $table->string('nickname')->nullable();
            $table->string('brand');
            $table->string('fingerprint');
            $table->string('last_4');
            $table->boolean('default')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamp('added_at')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('deactived_at')->nullable();
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
        Schema::dropIfExists('credit_cards');
    }
}
