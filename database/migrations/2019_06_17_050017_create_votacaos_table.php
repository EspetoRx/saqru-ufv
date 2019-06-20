<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('refeicao')->unsigned()->unique();
            $table->integer('estrelaSabor1')->default(0);
            $table->integer('estrelaSabor2')->default(0);
            $table->integer('estrelaSabor3')->default(0);
            $table->integer('estrelaSabor4')->default(0);
            $table->integer('estrelaSabor5')->default(0);
            $table->integer('estrelaHigiene1')->default(0);
            $table->integer('estrelaHigiene2')->default(0);
            $table->integer('estrelaHigiene3')->default(0);
            $table->integer('estrelaHigiene4')->default(0);
            $table->integer('estrelaHigiene5')->default(0);
            $table->integer('estrelaCardapio1')->default(0);
            $table->integer('estrelaCardapio2')->default(0);
            $table->integer('estrelaCardapio3')->default(0);
            $table->integer('estrelaCardapio4')->default(0);
            $table->integer('estrelaCardapio5')->default(0);
            $table->integer('estrelaAmbiente1')->default(0);
            $table->integer('estrelaAmbiente2')->default(0);
            $table->integer('estrelaAmbiente3')->default(0);
            $table->integer('estrelaAmbiente4')->default(0);
            $table->integer('estrelaAmbiente5')->default(0);
            $table->foreign('refeicao')->references('id')->on('refeicaos')->onDelete('cascade');
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
        Schema::dropIfExists('votacaos');
    }
}
