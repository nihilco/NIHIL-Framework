<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('creator_id')->index();
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('type_id')->nullable();
            $table->unsignedInteger('priority_id')->nullable();
            $table->unsignedInteger('status_id')->default(1);
            $table->unsignedInteger('resolution_id')->nullable();
            $table->string('title', 100);
            $table->string('slug', 100)->unique();
            $table->text('description');
            $table->unsignedInteger('assignee_id')->nullable();
            $table->time('estimated_time')->nullable();
            $table->time('actual_time')->default(0);
            $table->timestamp('assigned_at')->nullable();
            $table->timestamp('closed_at')->nullable();
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
        Schema::dropIfExists('issues');
    }
}
