<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Realizando a Migration para a atualização das tabelas no banco de dados mySqlWorkBench

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // function up() para subir um dado ao banco cadastros

    public function up()
    {
        Schema::create('cadastros', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('idade');
            $table->string('email');
            $table->string('tell');
            $table->string('cep');
            $table->string('ddd');
            $table->string('uf');
            $table->string('localizacao');
            $table->string('rua');
            $table->string('bairro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    //  function down() para retirar algum valor do banco cadastros

    public function down()
    {
        Schema::dropIfExists('cadastros');
    }
};
