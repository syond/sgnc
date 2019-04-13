<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterOnibusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('onibus', function (Blueprint $table) {
            $table->bigInteger('equipamento_id')->unsigned();
            $table->foreign('equipamento_id')
                  ->references('id')
                  ->on('equipamentos')
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
        Schema::table('onibus', function(Blueprint $table){
            $table->dropForeign('onibus_equipamento_id_foreign');
            $table->dropForeign('onibus_administrador_id_foreign');
        });
    }
}
