<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('telefone');
            $table->string('alergias')->nullable();
            $table->string('plano_saude')->nullable();
            $table->float('peso');
            $table->float('altura');
            $table->string('tipo_sangue');
            $table->string('doencas_cronicas')->nullable();
            $table->string('cpf',14)->unique();
            $table->string('rg')->nullable()->unique();
            $table->string('cep', 9);
            $table->string('logradouro');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('numero');
            $table->string('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
