<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propostas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('dados_bancarios_id');
            $table->string('valorSolicitado', 20); // 999.999.99 (true -> só permite valores positivos )
            $table->string('taxaJuros', 20);
            $table->string('parcelaMensal', 20);
            $table->string('limiteNecessario', 20);
            $table->integer('totalParcelas');

            $table->timestamps();

            //constraints
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('dados_bancarios_id')->references('id')->on('dados_bancarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('propostas', function (Blueprint $table) {
            $table->dropForeign('propostas_clientes_id_foreign');
            Schema::dropColumn('cliente_id');
        });
        Schema::dropIfExists('propostas');
    }
}
