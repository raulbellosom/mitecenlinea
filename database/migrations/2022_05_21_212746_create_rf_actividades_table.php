<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rf_actividades', function (Blueprint $table) {
            $table->id();

            $table->integer('rf_no_eventos');
            $table->integer('rf_no_horas');

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
        Schema::dropIfExists('rf_actividades');
    }
}
