<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaaUnidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raa_unidads', function (Blueprint $table) {
            $table->id();
            $table->integer('no_unidad');
            $table->integer('no_alu_reprobados');
            $table->integer('porcentaje_reprobacion');
            $table->integer('promedio_grupal');
            $table->integer('porcentaje_asistencia');
            
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
        Schema::dropIfExists('raa_unidads');
    }
}
