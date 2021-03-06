<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTecnicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tecnicos', function (Blueprint $table) {
            $table->bigInteger('administrador_id')->unsigned();
            $table->foreign('administrador_id')
                  ->references('id')
                  ->on('administradores')
                  ->onDelete('cascade');
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
        Schema::table('tecnicos', function(Blueprint $table){
            $table->dropForeign('tecnicos_administrador_id_foreign');
            $table->dropForeign('tecnicos_funcionario_id_foreign');
        });
    }
}
