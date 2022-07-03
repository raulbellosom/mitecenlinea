<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfActividades2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rf_actividades_2s', function (Blueprint $table) {
            $table->id();
            $table->string('rf_evento');
            $table->string('rf_a_participantes');
            $table->integer('rf_h_empleadas');
            $table->string('rf_contribucion');

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
        Schema::dropIfExists('rf_actividades_2s');
    }
}
