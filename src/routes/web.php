<?php

/**
 * Classes importadas para auxiliar
 *  */
use App\Http\Middleware\CheckAdmin;



/**
 * Rota INDEX que redireciona para a View de LOGIN
 * com middleware de autenticação e checagem se o usuário
 * é administrador ou não.
 *  */
Route::get  ('/', function(){

    return view('auth.login');

})->middleware('auth', 'CheckAdmin');


/**
 * Rota LOGOUT que redireciona para a View de LOGIN pelo método logout()
 *  */
Route::get('/logout', 'Auth\LoginController@logout');


/**
 * Rota para utilizarmos todas as Rotas do AUTH, menos as que forem passadas como FALSE
 *  */
Auth::routes(['register' => false]);


/**
 * Rota DASHBOARD só é acessada após o login
 *  */
Route::get ('/dashboard', 'DashboardController@index');










//ROTA PARA TESTES
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
