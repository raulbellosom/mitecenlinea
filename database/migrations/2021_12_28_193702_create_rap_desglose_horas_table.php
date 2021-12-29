<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapDesgloseHorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rap_desglose_horas', function (Blueprint $table) {
            $table->id();
            $table->integer('horas_teoricas');
            $table->integer('horas_practicas');
            $table->integer('total_horas');
            $table->integer('cantidad_horas_aula');
            $table->integer('cantidad_horas_externas');
            $table->integer('cantidad_horas_taller');
            $table->integer('porcentaje_horas_tecnologia');
            
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
        Schema::dropIfExists('rap_desglose_horas');
    }
}
