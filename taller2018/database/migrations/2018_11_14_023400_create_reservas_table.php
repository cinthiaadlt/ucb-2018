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
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('id_parqueos');
            $table->foreign('id_parqueos')->references('id_parqueos')->on('parqueos')->onDelete('cascade')->onUpdate('cascade');
            $table->date('dia_reserva');
            $table->time('h_inicio_reserva');
            $table->time('h_fin_reserva');
            $table->decimal('total_reserva', 10, 7)->nullable();
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
