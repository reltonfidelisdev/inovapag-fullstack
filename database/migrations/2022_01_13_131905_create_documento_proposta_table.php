<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoPropostaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_proposta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proposta_id');
            $table->string('statusDocumento');
            $table->string('nomeDocumento');
            $table->string('tipoDocumento');
            $table->timestamps();

            //constraints - proposta
            $table->foreign('proposta_id')->references('id')->on('propostas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documento_proposta', function (Blueprint $table) {
            $table->dropForeign('documento_proposta_id_foreign');
            Schema::dropColumn('proposta_id');
        });
        Schema::dropIfExists('documento_proposta');
    }
}
