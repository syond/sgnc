<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAdministradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('administradores', function (Blueprint $table) {
            $table->bigInteger('funcionario_id')->unsigned();
            $table->foreign('funcionario_id')
                  ->references('id')
                  ->on('funcionarios')
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
        Schema::table('administradores', function(Blueprint $table){
            $table->dropForeign('administradores_funcionario_id_foreign');
        });
    }
}
