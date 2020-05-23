<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfissionaisConvenios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profissionais_convenios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_profissional');
            $table->unsignedBigInteger('id_convenio');
            $table->foreign('id_convenio')->references('id')->on('convenios');
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
        Schema::dropIfExists('profissionais_convenios');
    }
}
