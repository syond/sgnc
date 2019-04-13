<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipamentos', function (Blueprint $table) {
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
        Schema::table('equipamentos', function(Blueprint $table){
            $table->dropForeign('equipamentos_administrador_id_foreign');
        });
    }
}
