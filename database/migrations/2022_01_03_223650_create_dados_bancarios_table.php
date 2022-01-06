<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDadosBancariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_bancarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->integer('codigoBanco');
            $table->string('nomeBanco', 50);
            $table->string('tipoConta', 100);
            $table->string('agenciaComDigito', 15);
            $table->string('contaComDigito', 15);
            $table->timestamps();

            //constraints
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->unique('cliente_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dados_bancarios', function (Blueprint $table) {
            $table->dropForeign('dados_bancarios_id_foreign');
            Schema::dropColumn('cliente_id');
        });
        Schema::dropIfExists('dados_bancarios');
    }
}
