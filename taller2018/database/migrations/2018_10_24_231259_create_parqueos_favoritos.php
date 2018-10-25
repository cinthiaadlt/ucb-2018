<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParqueosFavoritos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parqueos_favoritos', function (Blueprint $table) {
            $table->increments('id_parqueos_favoritos');
            $table->unsignedInteger('id_parqueos');
            $table->unsignedInteger('id_usuarios');
            $table->string('favorito');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parqueos_favoritos');
    }
}
