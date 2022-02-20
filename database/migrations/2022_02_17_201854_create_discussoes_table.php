<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussoesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('discussoes', function (Blueprint $table) {
            $table->id();

            $table->text('titulo');

            $table->text('texto');

            $table->bigInteger('jogo_id')->unsigned();
            $table->foreign('jogo_id')->references('id')->on('jogos');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('discussoes');
    }
}
