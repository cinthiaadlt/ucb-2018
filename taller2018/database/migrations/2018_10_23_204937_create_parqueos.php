<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParqueos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parqueos', function (Blueprint $table) {
            $table->increments('id_parqueos');
            $table->unsignedInteger('id_zonas');
            $table->foreign('id_zonas')->references('id_zonas')->on('zonas');
            $table->string('direccion', 100);
            $table->decimal('latitud_x', 20, 10);
            $table->decimal('longitud_y', 20, 10);
            $table->integer('cantidad_p');
            $table->string('foto', 250);
            $table->string('telefono_contacto_1', 45);
            $table->string('telefono_contacto_2', 45);
            $table->integer('estado_funcionamiento');
            $table->integer('cat_estado_parqueo');
            $table->integer('cat_validacion');
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
        Schema::dropIfExists('parqueos');
    }
}
