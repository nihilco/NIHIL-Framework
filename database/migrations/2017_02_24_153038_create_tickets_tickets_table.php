<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('type_id')->nullable();
            $table->integer('priority_id')->nullable();
            $table->integer('status_id')->nullable();
            $table->integer('resolution_id')->nullable();
            $table->integer('assignee_id')->nullable();
            $table->time('estimated_time')->nullable();
            $table->time('actual_time')->nullable();
            $table->timestamp('assigned_at')->nullable();
            $table->timestamp('closed_at')->nullable();
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
        Schema::dropIfExists('tickets_tickets');
    }
}
