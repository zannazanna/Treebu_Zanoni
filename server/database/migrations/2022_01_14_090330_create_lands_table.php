<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text("comune")->nullable();
            $table->string("foto")->nullable();
            $table->float("dimensione")->nullable();
            $table->string("foglio_catastale")->nullable();
            $table->string("mappale_catastale")->nullable();
            $table->string("parcella_catastale")->nullable();
            $table->string("terreno")->nullable();
            $table->string("irrigazione")->nullable();
            $table->string("offerta")->nullable();
            $table->float("canone")->nullable();
            $table->boolean("disponibile")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lands');
    }
}
