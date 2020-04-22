<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postagens', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('mensagem');
            $table->string('emoji');
            $table->integer('personagem_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('postagens', function (Blueprint $table) {
            $table->foreign('personagem_id')
            ->references('id')
            ->on('personagens')
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
        Schema::dropIfExists('postagens');
    }
}
