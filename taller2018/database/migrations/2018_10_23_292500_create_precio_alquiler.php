<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrecioAlquiler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios_alquiler', function (Blueprint $table) {
            $table->increments('id_precios_alquiler');
            $table->unsignedInteger('id_parqueos');
            $table->foreign('id_parqueos')->references('id_parqueos')->on('parqueos');
            $table->unsignedInteger('id_hs_funcionamiento');
            $table->foreign('id_hs_funcionamiento')->references('id_hs_funcionamiento')->on('horarios_funcionamiento');
            $table->decimal('tarifa_hora_normal', 10, 7);
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
        Schema::dropIfExists('precio_alquiler');
    }
}
