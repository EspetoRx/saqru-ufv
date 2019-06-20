<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefeicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refeicaos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_refeicao')->unsigned();
            $table->text('cardapio');
            $table->date('dia');
            $table->foreign('tipo_refeicao')->references('id')->on('tipo_refeicaos')->onDelete('cascade');
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
        Schema::dropIfExists('refeicaos');
    }
}
