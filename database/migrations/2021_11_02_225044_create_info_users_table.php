<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_users', function (Blueprint $table) {
            $table->id();

            $table->string("telefono");
            $table->string("direccion");
            $table->string("edad");
            $table->string("curp");
            $table->string("nss");
            $table->string("rfc");
            $table->string("genero");
            $table->string("imagen");
            $table->timestamps();

            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_users');
        
    }
}
