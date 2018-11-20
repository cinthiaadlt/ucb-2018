<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_cliente');
            $table->foreign('id_cliente')->references('id')->on('users');
            $table->timestamp('fecha_factura')->nullable ();
            $table->timestamp('fecha_expiracion_factura')->nullable ();
            $table->string('codigo_autorizacion', '100');
            $table->string('codigo_control', '100');
            $table->string('estado_pago', '100');
            $table->decimal('importe_total_parqueo', 10, 7);
            $table->decimal('comision_importe', 10, 7);
            $table->unsignedInteger('id_empresa');
            $table->foreign('id_empresa')->references('id')->on('datos_empresa');
            $table->string('estado_factura', '100');
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
        Schema::dropIfExists('facturas');
    }
}
