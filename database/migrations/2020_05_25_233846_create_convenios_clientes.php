<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConveniosClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenios_clientes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_convenio');

            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->foreign('id_convenio')->references('id')->on('convenios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convenios_clientes');
    }
}
