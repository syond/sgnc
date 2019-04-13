<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->bigInteger('pessoa_id')->unsigned();
            $table->foreign('pessoa_id')
                  ->references('id')
                  ->on('pessoas')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionarios', function(Blueprint $table){
            $table->dropForeign('funcionarios_pessoa_id_foreign');
        });
    }
}
