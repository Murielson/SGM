<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->enum('status', ['nova', 'visualizada']);

            $table->integer('from')->unsigned();
            $table->foreign('from')->references('id')->on('users')->onDelete('cascade');

            $table->integer('to')->unsigned();
            $table->foreign('to')->references('id')->on('users')->onDelete('cascade');

            $table->integer('mensagem_id')->unsigned();
            $table->foreign('mensagem_id')->references('id')->on('mensagem_notificacao')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notificacoes');
    }
}
