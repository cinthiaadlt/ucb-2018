<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id_usuarios');
            $table->string('primer_nombre','45');
            $table->string('segundo_nombre','45')->nullable();
            $table->string('tercer_nombre','45')->nullable();
            $table->string('primer_apellido','45');
            $table->string('segundo_apellido','45')->nullable();
            $table->string('tercer_apellido','45')->nullable();
            $table->string('nombre_usuario','45');
            $table->string('password','100');
            $table->string('nacionalidad','45');
            $table->string('foto','100')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
