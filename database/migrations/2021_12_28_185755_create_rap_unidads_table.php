<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapUnidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rap_unidads', function (Blueprint $table) {
            $table->id();
            $table->integer('no_unidad');
            $table->string('nombre_unidad');
            $table->integer('porcentaje_avance');
            $table->integer('no_criterios');
            $table->integer('porcentaje_alumnos_aprobados');
            $table->integer('promedio_calificaciones');
            
            $table->unsignedBigInteger('rap_id');
            $table->foreign('rap_id')->references('id')->on('raps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rap_unidads');
    }
}
