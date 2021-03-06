<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEstatisticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estatisticas', function (Blueprint $table) {
            $table->bigInteger('nao_conformidade_id')->unsigned();
            $table->foreign('nao_conformidade_id')
                  ->references('id')
                  ->on('nao_conformidades')
                  ->onDelete('cascade');
            $table->bigInteger('corretiva_id')->unsigned();
            $table->foreign('corretiva_id')
                  ->references('id')
                  ->on('corretivas')
                  ->onDelete('cascade');
            $table->bigInteger('imediata_id')->unsigned();
            $table->foreign('imediata_id')
                  ->references('id')
                  ->on('imediatas')
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
        Schema::table('estatisticas', function(Blueprint $table){
            $table->dropForeign('estatisticas_nao_conformidade_id_foreign');
            $table->dropForeign('estatisticas_corretiva_id_foreign');
            $table->dropForeign('estatisticas_imediata_id_foreign');
        });
    }
}
