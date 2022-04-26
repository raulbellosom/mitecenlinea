<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdPagsTable extends Migration
{
    /**
     * Reporte diagnostico
     * Plan de accion general
     * Solo 1 registro no es dinamico
     * @return void
     */
    public function up()
    {
        Schema::create('rd_pags', function (Blueprint $table) {
            $table->id();
            $table->string('deficiencia_general');
            $table->string('accion_general');
            $table->string('tiempo_general');
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
        Schema::dropIfExists('rd_pags');
    }
}
