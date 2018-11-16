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
            $table->string('dia', 45);
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
