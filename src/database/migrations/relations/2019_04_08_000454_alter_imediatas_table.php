<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterImediatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imediatas', function (Blueprint $table) {
            $table->bigInteger('equipamento_id')->unsigned();
            $table->foreign('equipamento_id')
                  ->references('id')
                  ->on('equipamentos')
                  ->onDelete('cascade');
            $table->bigInteger('tecnico_id')->unsigned();
            $table->foreign('tecnico_id')
                  ->references('id')
                  ->on('tecnicos')
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
        Schema::table('imediatas', function(Blueprint $table){
            $table->dropForeign('imediatas_equipamento_id_foreign');
            $table->dropForeign('imediatas_tecnico_id_foreign');
        });
    }
}
