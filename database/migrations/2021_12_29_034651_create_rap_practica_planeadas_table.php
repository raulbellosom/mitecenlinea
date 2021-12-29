<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapPracticaPlaneadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rap_practica_planeadas', function (Blueprint $table) {
            $table->id();
            $table->integer('practicas_planeadas');
            $table->integer('practicas_realizadas');
            $table->string('nombre_practicas');
            $table->string('observaciones');
            $table->integer('practicas_no_planeadas');
            $table->string('nombre_no_planeadas');
            $table->string('talleres');
            $table->string('diferencias');
            
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
        Schema::dropIfExists('rap_practica_planeadas');
    }
}
