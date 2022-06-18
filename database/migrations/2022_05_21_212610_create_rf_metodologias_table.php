<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfMetodologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rf_metodologias', function (Blueprint $table) {
            $table->id();

            $table->string('rf_tecnicas');
            $table->string('rf_no_temas');
            $table->integer('rf_promedio');

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
        Schema::dropIfExists('rf_metodologias');
    }
}
