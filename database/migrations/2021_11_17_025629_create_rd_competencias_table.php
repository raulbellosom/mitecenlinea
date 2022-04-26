<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdCompetenciasTable extends Migration
{
    /**
     * Reporte diagnostico 
     * competencias
     * Admite registros multiples (Dinamico)
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rd_competencias', function (Blueprint $table) {
            $table->id();
            $table->string('competencia',500);
            $table->integer('ponderacion');

            $table->unsignedBigInteger('r_diagnostico_id');
            $table->foreign('r_diagnostico_id')->references('id')->on('reporte_diagnosticos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rd_competencias');
    }
}
