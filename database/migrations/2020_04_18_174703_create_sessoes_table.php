<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessoes', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nome');
            $table->binary('imagem');
            $table->string('codigo');
            $table->integer('professor_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('sessoes', function (Blueprint $table) {
            $table->foreign('professor_id')
            ->references('id')
            ->on('professores')
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
        Schema::dropIfExists('sessoes');
    }
}
