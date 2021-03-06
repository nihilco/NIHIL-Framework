<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('emails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id');
            $table->string('key')->unique();
            $table->string('to');
            $table->string('from');
            $table->string('subject');
            $table->text('text');
            $table->text('html');
            $table->text('raw');
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('opened_at')->nullable();
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
        Schema::dropIfExists('emails');
    }
}
