<?php

use Illuminate\Database\Seeder;

use DB;

class FuncionariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funcionarios')->insert([
            'matricula' => '2019',
            'password' => bcrypt('admin2019'),
            'nome' => 'admin',
            'email' => 'admin@sgnc.com',
            'foto' => '',
        ]);
    }
}
