<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoMultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_multas', function (Blueprint $table) {
            $table->increments('id_tipo_multa');
            $table->string('nombre_tipo_multa');
            $table->string('descripcion_multa');
            $table->decimal('tarifa_multa');
            $table->integer('cat_grado_multa');
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
        Schema::dropIfExists('tipo_multas');
    }
}
