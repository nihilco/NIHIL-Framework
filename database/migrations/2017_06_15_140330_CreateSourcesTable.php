<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sources', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id');
            $table->integer('customer_id');
            $table->integer('source_type_id');
            $table->string('stripe_id');
            $table->string('fingerprint');
            $table->string('nickname');
            $table->string('reference_number');
            $table->boolean('default')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamp('added_at')->nullable();
            $table->timestamp('deactived_at')->nullable();
            $table->timestamp('last_used_at')->nullable();
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
        //
        Schema::dropIfExists('sources');
    }
}
