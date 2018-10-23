<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoIdentidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_identidad', function (Blueprint $table) {
            $table->increments('id_docs_identidad');
            $table->unsignedInteger('id_usuarios');
            $table->foreign('id_usuarios')->references('id_usuarios')->on('usuarios');
            $table->integer('numero_documento');
            $table->string('imagen_documento', 250);
            $table->integer('cat_tipo_documento');
            $table->integer('tx_id_usuario');
            $table->timestamp('tx_fecha');
            $table->integer('tx_host');
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
        Schema::dropIfExists('documento_identidad');
    }
}
