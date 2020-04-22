<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personagens', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nome');
            $table->string('descricao');
            $table->binary('imagem');
            $table->boolean('exclusivo');
            $table->integer('sessao_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('personagens', function (Blueprint $table) {
            $table->foreign('sessao_id')
            ->references('id')
            ->on('sessoes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personagens');
    }
}
