<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table-> dateTimeTz('horario');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_profissional');
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->foreign('id_profissional')->references('id')->on('profissionais');
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
        Schema::dropIfExists('agenda');
    }
}
