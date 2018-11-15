<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id_reservas');
            $table->unsignedInteger('id_usuarios');
            $table->foreign('id_usuarios')->references('id_usuarios')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('id_precios_alquiler');
            $table->foreign('id_precios_alquiler')->references('id_precios_alquiler')->on('precios_alquiler')->onDelete('cascade')->onUpdate('cascade');
            $table->date('dia_reserva');
            $table->time('h_inicio_reserva');
            $table->time('h_fin_reserva');
            $table->integer('estado_reserva')->nullable();
            $table->integer('estado_espacio')->nullable();
            $table->integer('calificacion_cliente')->nullable();
            $table->integer('calificacion_anfitrion')->nullable();
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
        Schema::dropIfExists('reservas');
    }
}
