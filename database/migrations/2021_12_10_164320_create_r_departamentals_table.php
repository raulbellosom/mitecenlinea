<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRDepartamentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_departamentals', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('autor');
            $table->string('nombre_reporte');
            $table->string('asignatura');
            $table->string('grado');
            $table->string('grupo');
            $table->string('turno');
            $table->string('carrera');
            $table->string('semestre');
            $table->integer('total_alumnos_lista');
            $table->integer('total_alumnos_examen');
            $table->integer('unidad_evaluada');
            $table->date('fecha_aplicacion_examen');
            $table->integer('prom_alumnos_aprobados');
            $table->integer('promedio_general');
            $table->string('comen_generales');
            $table->string('comen_particulares');
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
        Schema::dropIfExists('r_departamentals');
    }
}
