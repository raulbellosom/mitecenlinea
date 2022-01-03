<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfPracticasEspaciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rf_practicas_espacios', function (Blueprint $table) {
            $table->id();
            $table->string('espacios_aulas');
            $table->string('espacios_talleres');
            $table->string('espacios_laboratorios');
            $table->integer('no_practicas_programadas');
            $table->integer('porcentaje_practicas');
            $table->string('nombre_practicas');
            $table->integer('e_canon_por_uso');
            $table->string('e_canon_tipo');
            $table->integer('e_pc_por_uso');
            $table->string('e_pc_tipo');
            $table->integer('e_rotafolio_por_uso');
            $table->string('e_rotafolio_tipo');
            $table->integer('e_tv_por_uso');
            $table->string('e_tv_tipo');
            $table->integer('e_dvd_por_uso');
            $table->string('e_dvd_tipo');
            $table->string('e_otro')->nullable();
            $table->integer('e_otro_por_uso')->nullable();
            $table->string('e_otro_tipo')->nullable();
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
        Schema::dropIfExists('rf_practicas_espacios');
    }
}
