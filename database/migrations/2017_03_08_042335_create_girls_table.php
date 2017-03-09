<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGirlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('girls', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('bimla')->default(false);
            $table->boolean('binita')->default(false);
            $table->boolean('christina')->default(false);
            $table->boolean('dawa')->default(false);
            $table->boolean('dechen')->default(false);
            $table->boolean('dekhyong')->default(false);
            $table->boolean('gayatri')->default(false);
            $table->boolean('gyalmit')->default(false);
            $table->boolean('karma')->default(false);
            $table->boolean('maite')->default(false);
            $table->boolean('muskan')->default(false);
            $table->boolean('ongmu')->default(false);
            $table->boolean('palmu')->default(false);
            $table->boolean('pasang')->default(false);
            $table->boolean('pasangkee')->default(false);
            $table->boolean('pema')->default(false);
            $table->boolean('pemma')->default(false);
            $table->boolean('renu')->default(false);
            $table->boolean('rinsing')->default(false);
            $table->boolean('saraswati')->default(false);
            $table->boolean('sonam')->default(false);
            $table->boolean('soyata')->default(false);
            $table->boolean('sunita')->default(false);
            $table->boolean('tashi')->default(false);
            $table->boolean('tenzing')->default(false);
            $table->boolean('tenzing_paden')->default(false);
            $table->boolean('tsering')->default(false);
            $table->boolean('yangchen')->default(false);
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
        Schema::dropIfExists('girls');
    }
}
