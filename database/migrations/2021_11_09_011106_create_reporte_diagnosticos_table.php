<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteDiagnosticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_diagnosticos', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('autor');
            $table->string('nombre_reporte');
            $table->string('asignatura');
            $table->string('tipo_evaluacion');
            $table->string('cantidad_alumnos');
            $table->string('carrera');
            $table->string('grado');
            $table->string('grupo');
            $table->string('turno');
            $table->integer('status');
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
        Schema::dropIfExists('reporte_diagnosticos');
    }
}
