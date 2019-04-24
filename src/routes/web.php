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

Route::get  ('/', function(){
    return view('auth.login');
})->middleware('auth');

//definindo que não utilizaremos o Register da classe Auth.
Auth::routes(['register' => false]);

Route::post ('/dashboard', 'DashboardController@index');








/**
Route::resources([
    'tecnico'  => 'TecnicoController@create',
    'onibus'   => 'OnibusController',
    'empresa'   => 'EmpresaController',
    'setor'   => 'SetorController',
]);
 */
Route::resource('funcionario', 'FuncionarioController');


