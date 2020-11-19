<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professores', function (Blueprint $table) {
                $table->increments('id')->unique();
                $table->string('name', 14);
                $table->string('sobrenome', 40);
                $table->string('email', 64)->unique();
                $table->string('avatar')->default('default.jpg');
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->boolean('unconfirmed');
                $table->rememberToken();
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
        Schema::dropIfExists('professores');
    }
}
