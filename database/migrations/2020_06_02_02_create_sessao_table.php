<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessao', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('codigoDeAcesso')->unique();
            $table->string('dataDeEncerramento');
            $table->boolean('pausa');
            $table->tinyInteger('bloqueado')->default('0');
            $table->integer('idProfessorSessao');
            $table->integer('quantidadeDeAlunos');
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
        Schema::dropIfExists('sessao');
    }
}
