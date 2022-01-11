<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtendentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('franquia_id');
            $table->string('nomeAtendente');
            $table->timestamps();

            //constraints - clientes
            $table->foreign('franquia_id')->references('id')->on('franquias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atendentes');
    }
}
