<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorretivasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corretivas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data');
            $table->text('descricao');
            $table->string('nome', 100);
            $table->string('tipo', 100);
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
        Schema::dropIfExists('corretivas');
    }
}
