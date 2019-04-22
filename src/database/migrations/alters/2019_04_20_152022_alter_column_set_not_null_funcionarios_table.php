<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnSetNotNullFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->string('matricula')->nullable(false)->change();
            $table->string('senha')->nullable(false)->change();
            $table->string('nome')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->string('matricula')->change();
            $table->string('senha')->change();
            $table->string('nome')->change();
            $table->string('email')->change();
        });
    }
}
