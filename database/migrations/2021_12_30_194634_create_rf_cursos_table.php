<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rf_cursos', function (Blueprint $table) {
            $table->id();
            $table->integer('no_unidades');
            $table->integer('porcentaje_cobertura_programa');
            $table->string('causas')->nullable();
            $table->integer('no_alu_lista');
            $table->integer('no_alu_aprobados');
            $table->integer('no_alu_reprobados');
            $table->integer('no_alu_desercion');
            $table->integer('prom_general');
            $table->string('caracteristicas_grupo');
            $table->integer('porcentaje_asistencia');
            $table->string('observaciones');
            
            $table->unsignedBigInteger('rf_id');
            $table->foreign('rf_id')->references('id')->on('r_finals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rf_cursos');
    }
}
