<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplementosDiagnosticoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('competencias', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('competencia',500);
        //     $table->integer('ponderacion');

        //     $table->unsignedBigInteger('r_diagnostico_id');
        //     $table->foreign('r_diagnostico_id')->references('id')->on('reporte_diagnosticos');
        // });
        // Schema::create('pag', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('deficiencia_general');
        //     $table->string('accion_general');
        //     $table->string('tiempo_general');
        //     $table->unsignedBigInteger('r_diagnostico_id');
        //     $table->foreign('r_diagnostico_id')->references('id')->on('reporte_diagnosticos');
        // });
        // Schema::create('pap', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('alumno_particular');
        //     $table->string('deficiencia_particular');
        //     $table->string('accion_particular');
            
        //     $table->unsignedBigInteger('r_diagnostico_id');
        //     $table->foreign('r_diagnostico_id')->references('id')->on('reporte_diagnosticos');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('competencias');
        // Schema::dropIfExists('pag');
        // Schema::dropIfExists('pap');
    }
}
