<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('favorites', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('creator_id')->index();
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('resource_id');
            $table->string('resource_type', 50);
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['user_id', 'resource_id', 'resource_type']);
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
        Schema::dropIfExists('favorites');
    }
}