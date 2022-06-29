<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfActividades2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rf_actividades_2', function (Blueprint $table) {
            $table->id();
            $table->string('rf_evento');
            $table->string('rf_a_participantes');
            $table->integer('rf_h_empleadas');
            $table->string('rf_contribucion');

            $table->unsignedBigInteger('id_actividades');
            $table->foreign('id_actividades')->references('id')->on('rf_actividades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rf_actividades_2');
    }
}
