<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegiosRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privilegios_roles', function (Blueprint $table) {
            $table->increments('id_privilegios_roles');
            $table->unsignedInteger('id_privilegios');
            $table->unsignedInteger('id_roles');
            $table->foreign('id_privilegios')->references('id_privilegios')->on('privilegios');
            $table->foreign('id_roles')->references('id_roles')->on('roles');
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
        Schema::dropIfExists('privilegios_roles');
    }
}
