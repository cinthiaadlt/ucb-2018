<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorarioFuncionamiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios_funcionamiento', function (Blueprint $table) {
            $table->increments('id_hs_funcionamiento');
            $table->time('hora_apertura');
            $table->time('hora_cierre');
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
        Schema::dropIfExists('horario_funcionamiento');
    }
}
