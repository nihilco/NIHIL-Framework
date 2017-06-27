<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrippersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('trippers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trip_id');
            $table->integer('tripper_type_id');
            $table->integer('trip_group_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->text('notes')->nullable();
            $table->datetime('arrives_at')->nullable();
            $table->datetime('departs_at')->nullable();
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
        Schema::dropIfExists('trippers');
    }
}
