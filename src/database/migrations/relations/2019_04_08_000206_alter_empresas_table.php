<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->bigInteger('onibus_id')->unsigned();
            $table->foreign('onibus_id')
                  ->references('id')
                  ->on('onibus')
                  ->onDelete('cascade');
            $table->bigInteger('setor_id')->unsigned();
            $table->foreign('setor_id')
                  ->references('id')
                  ->on('setores')
                  ->onDelete('cascade');
            $table->bigInteger('administrador_id')->unsigned();
            $table->foreign('administrador_id')
                  ->references('id')
                  ->on('administradores')
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
        Schema::table('empresas', function(Blueprint $table){
            $table->dropForeign('empresas_onibus_id_foreign');
            $table->dropForeign('empresas_setor_id_foreign');
            $table->dropForeign('empresas_administrador_id_foreign');
        });
    }
}
