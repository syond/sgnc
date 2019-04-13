<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnibusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onibus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('modelo');
            $table->string('placa', 8);
            $table->string('chassi', 18);
            $table->string('numero', 3);
            $table->string('ano', 4);
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
        Schema::dropIfExists('onibus');
    }
}
