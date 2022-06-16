<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('data_ini');
            $table->date('data_fim')->nullable();
            $table->string('evolucao')->nullable();
            $table->integer('usuario_id');
            $table->integer('enfermeiro_id');
            $table->integer('paciente_id');

            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('enfermeiro_id')->references('id')->on('enfermeiros');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tratamentos');
    }
}
