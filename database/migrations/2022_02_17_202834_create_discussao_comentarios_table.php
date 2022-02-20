<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussaoComentariosTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('discussao_comentarios', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('discussao_id')->unsigned();
            $table->foreign('discussao_id')->references('id')->on('discussoes');



            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('usuarios');

            $table->text('texto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('discussao_comentarios');
    }
}
