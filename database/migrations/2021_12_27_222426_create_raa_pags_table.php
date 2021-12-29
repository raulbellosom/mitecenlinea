<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaaPagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raa_pags', function (Blueprint $table) {
            $table->id();
            $table->string('deficiencia_general');
            $table->string('accion_general');
            $table->string('tiempo_general');
            $table->unsignedBigInteger('raa_id');
            $table->foreign('raa_id')->references('id')->on('raas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('raa_pags');
    }
}
