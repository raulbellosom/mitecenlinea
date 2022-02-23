<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('autor');
            $table->string('nombre_reporte');
            $table->string('periodo_corte');
            $table->string('asignatura');
            $table->string('grado');
            $table->string('grupo');
            $table->string('turno');
            $table->string('carrera');
            $table->string('total_alumnos');
            $table->string('total_alumnos_ausentes');
            $table->string('total_alumnos_desertados');
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
        Schema::dropIfExists('raas');
    }
}
