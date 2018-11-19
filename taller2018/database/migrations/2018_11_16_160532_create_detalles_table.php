<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_multa');
            $table->foreign('id_multa')->references('id')->on('multas');
            $table->unsignedInteger('id_reservas');
            $table->foreign('id_reservas')->references('id_reservas')->on('reservas');
            $table->unsignedInteger('id_facturas');
            $table->foreign('id_facturas')->references('id')->on('facturas');
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
        Schema::dropIfExists('detalles');
    }
}
