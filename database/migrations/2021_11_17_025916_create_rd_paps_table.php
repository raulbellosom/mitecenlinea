<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdPapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rd_paps', function (Blueprint $table) {
            $table->id();
            $table->string('alumno_particular');
            $table->string('deficiencia_particular');
            $table->string('accion_particular');
            
            $table->unsignedBigInteger('r_diagnostico_id');
            $table->foreign('r_diagnostico_id')->references('id')->on('reporte_diagnosticos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rd_paps');
    }
}
