<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePostagem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postagem', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomeAluno')->nullable();
            $table->string('sobrenomeAluno')->nullable();
            $table->string('avatarAluno')->nullable();
            $table->integer('idPersonagem');
            $table->string('nomePersonagem');
            $table->string('avatarPersonagem');
            $table->string('nomeProfessor')->nullable();
            $table->string('sobrenomeProfessor')->nullable();
            $table->string('avatarProfessor')->nullable();
            $table->string('mensagem', 280)->nullable();
            $table->string('imagem')->nullable();
            $table->string('codigoSessao');
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
        Schema::dropIfExists('postagem');
    }
}
