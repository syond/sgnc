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

Route::post  ('/', function(){
    return view('auth.login');
})->middleware('auth');

Route::get('/logout', 'Auth\LoginController@logout');

//definindo que não utilizaremos o Register da classe Auth.
Auth::routes(['register' => false]);

Route::get ('/dashboard', 'DashboardController@index');

Route::get('/templatetest', function(){
    return view('templates/template');
});








/**
Route::resources([
    'tecnico'  => 'TecnicoController@create',
    'onibus'   => 'OnibusController',
    'empresa'   => 'EmpresaController',
    'setor'   => 'SetorController',
]);
 */
Route::resource('funcionario', 'FuncionarioController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
