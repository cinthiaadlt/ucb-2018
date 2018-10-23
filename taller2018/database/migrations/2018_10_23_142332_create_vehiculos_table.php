<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id_vehiculos');
            $table->unsignedInteger('id_modelos');
            $table->unsignedInteger('id_usuarios');
            $table->string('color','10');
            $table->string('placa','100');
            $table->string('foto_vehiculo','100')->nullable();
            $table->unsignedInteger('cat_tipo_vehiculo');
            $table->foreign('id_modelos')->references('id_modelos')->on('modelos');
            $table->foreign('id_usuarios')->references('id_usuarios')->on('usuarios');
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
        Schema::dropIfExists('vehiculos');
    }
}
