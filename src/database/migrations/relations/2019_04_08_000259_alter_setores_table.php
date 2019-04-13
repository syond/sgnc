<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSetoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('setores', function (Blueprint $table) {
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
        Schema::table('setores', function(Blueprint $table){
            $table->dropForeign('setores_administrador_id_foreign');
        });
    }
}
