<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecepcionistas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepcionistas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->float('remuneracao');
            $table->string('telefone')->nullable();
            $table->time('jornTrab');
            $table->string('pis', 14)->unique();
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
        Schema::dropIfExists('recepcionistas');
    }
}
