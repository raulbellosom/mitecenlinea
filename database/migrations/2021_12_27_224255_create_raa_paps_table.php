<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaaPapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raa_paps', function (Blueprint $table) {
            $table->id();
            $table->string('alumno_particular');
            $table->string('deficiencia_particular');
            $table->string('accion_particular');
            
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
        Schema::dropIfExists('raa_paps');
    }
}
