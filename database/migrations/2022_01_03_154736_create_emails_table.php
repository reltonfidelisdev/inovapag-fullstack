<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->string('emailPrincipal', 150)->nullable();
            $table->string('emailSecundario', 150)->nullable();

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
        Schema::table('emails', function (Blueprint $table) {
            $table->dropForeign('email_clientes_id_foreign');
            Schema::dropColumn('cliente_id');
        });
        Schema::dropIfExists('emails');
    }
}
