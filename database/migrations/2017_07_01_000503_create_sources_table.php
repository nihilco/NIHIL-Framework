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
            $table->unsignedInteger('creator_id')->index();
            $table->unsignedInteger('account_id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('type_id');
            $table->string('stripe_id');
            $table->string('fingerprint');
            $table->string('hash');
            $table->string('nickname');
            $table->string('reference_number');
            $table->boolean('default')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamp('deactived_at')->nullable();
            $table->timestamp('last_used_at')->nullable();
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
        //
        Schema::dropIfExists('sources');
    }
}
