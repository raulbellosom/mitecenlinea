<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaaAnalisisResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raa_analisis_resultados', function (Blueprint $table) {
            $table->id();
            $table->string('analisis_descripcion');
            $table->string('analisis_acciones');
            
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
        Schema::dropIfExists('raa_analisis_resultados');
    }
}
