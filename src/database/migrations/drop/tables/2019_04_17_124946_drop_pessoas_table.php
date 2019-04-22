<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropPessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('pessoas');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 30);
            $table->string('cpf', 11);
            $table->date('data_nasc');
            $table->string('email', 50);
            $table->string('telefone1', 11);
            $table->string('telefone2', 11);
            $table->string('uf', 2);
            $table->string('cidade', 20);
            $table->string('bairro', 20);
            $table->string('rua', 30);
            $table->timestamps();
        });
    }
}
