<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('mode', 16);
            $table->string('status', 16)->nullable();
            $table->string('name');
            $table->string('account_id');
            $table->string('publishable_key')->nullable();
            $table->string('secret_key', 255)->nullable();
            $table->text('description')->nullable();
            $table->integer('country_id')->default(1);
            $table->boolean('managed')->default(true);
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
        Schema::dropIfExists('accounts');
    }
}
