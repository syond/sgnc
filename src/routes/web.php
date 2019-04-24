<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get  ('/', redirect()->route('funcionario.login'));

Route::get  ('/login',      ['uses' => 'Controller@login'                                                   ]);
Route::post ('/login',      ['as'   => 'funcionario.login',     'uses' => 'auth\LoginController@auth'       ]);

Route::post ('/dashboard',  ['as'   => 'dashboard',             'uses' => 'Controller@dashboard'            ]);

/**
Route::resources([
    'tecnico'  => 'TecnicoController@create',
    'onibus'   => 'OnibusController',
    'empresa'   => 'EmpresaController',
    'setor'   => 'SetorController',
]);
 */
Route::resource('funcionario', 'FuncionarioController');


