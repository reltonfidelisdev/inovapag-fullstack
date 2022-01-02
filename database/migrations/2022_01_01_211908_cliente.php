<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->string('nomeCompleto', 150);
            $table->string('cpf', 14); // 974.787.844-14
            $table->string('rg');
            $table->date('dataNascimento');
            $table->char('sexo', 1);
            $table->string('grauEscolaridade');
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
        //
    }
}
