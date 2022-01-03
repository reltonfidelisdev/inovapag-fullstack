<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelefonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->string('celularPrincipal', 15); //(81) 99651-0559
            $table->string('fixoProprio', 14); // (81) 3456-7890
            $table->string('fixoRecados', 14);
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
        Schema::table('telefones', function (Blueprint $table) {
            $table->dropForeign('telefone_clientes_id_foreign');
            Schema::dropColumn('cliente_id');
        });
        Schema::dropIfExists('telefones');
    }
}
