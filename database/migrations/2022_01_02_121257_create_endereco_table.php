<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->string('cep', 9); // 53110-080
            $table->string('numero', 10); // 999.999-AZ
            $table->string('logradouro', 150);
            $table->string('estado', 2);
            $table->string('cidade', 60);
            $table->string('bairro', 60);
            $table->string('complemento', 150)->nullable();
            $table->string('pontoReferencia', 150)->nullable();
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
        Schema::table('enderecos', function (Blueprint $table) {
            $table->dropForeign('endereco_clientes_id_foreign');
            Schema::dropColumn('cliente_id');
        });
        Schema::dropIfExists('enderecos');
    }
}
