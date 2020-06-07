<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadesProfissionais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidades_profissionais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_profissional');
            $table->unsignedBigInteger('id_especialidade');
            $table->timestamps();

            $table->foreign('id_profissional')->references('id')->on('profissionais');
            $table->foreign('id_especialidade')->references('id')->on('especialidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especialidades_profissionais');
    }
}
