<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumsThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forums_threads', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('forum_id');
            $table->unsignedInteger('user_id');
            $table->string('title', 50);
            $table->string('slug', 50)->unique();
            $table->text('body');
            $table->boolean('closed')->default(false);
            $table->timestamp('last_viewed_at')->nullable();
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
        Schema::dropIfExists('forums_threads');
    }
}
