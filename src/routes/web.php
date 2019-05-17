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

})->middleware('auth');


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


/**
 * Rotas do menu ADMINISTRADOR
 *  */

Route::get('admin/funcionario', 'FuncionarioController@index')->name('admin.funcionario');
Route::resource('admin/funcionario', 'FuncionarioController');

Route::get ('admin/empresa', 'EmpresaController@index')->name('admin.empresa');
Route::get ('admin/empresa/search', 'EmpresaController@search')->name('empresa.search');
Route::resource ('admin/empresa', 'EmpresaController');

Route::get ('admin/equipamento', 'EquipamentoController@index')->name('admin.equipamento');
Route::get ('admin/equipamento/search', 'EquipamentoController@search')->name('equipamento.search');
Route::resource ('admin/equipamento', 'EquipamentoController');

Route::get ('admin/onibus', 'OnibusController@index')->name('admin.onibus');
Route::resource ('admin/onibus', 'OnibusController');

Route::get ('admin/setor', 'SetorController@index')->name('admin.setor');
Route::resource ('admin/setor', 'SetorController');


/**
 * Rotas do menu TÉCNICO
 *  */
Route::get ('tecnico/nao-conformidade', 'NaoConformidadeController@index')->name('tecnico.naoconformidade');
Route::resource ('tecnico/nao-conformidade', 'NaoConformidadeController');

Route::get ('tecnico/acao-corretiva', 'CorretivaController@index')->name('tecnico.acaocorretiva');
Route::resource ('tecnico/acao-corretiva', 'CorretivaController');

Route::get ('tecnico/acao-imediata', 'CorretivaController@index')->name('tecnico.acaoimediata');
Route::resource ('tecnico/acao-imediata', 'ImediataController');






/**
Route::resources([
    'tecnico'  => 'TecnicoController@create',
    'onibus'   => 'OnibusController',
    'empresa'   => 'EmpresaController',
    'setor'   => 'SetorController',
]);
 */
