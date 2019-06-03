<?php

/**
 * Rota INDEX que redireciona para a View de LOGIN
 * com middleware de autenticação e checagem se o usuário
 * é administrador ou não.
 *  */
Route::get('/', function(){

    return view('auth.login');

});


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
Route::get ('/dashboard', 'DashboardController@index')->middleware('auth');


/**
 * Rotas do menu ADMINISTRADOR
 *  */

Route::get('admin/funcionario', 'FuncionarioController@index')->name('admin.funcionario');
Route::get ('admin/funcionario/search', 'FuncionarioController@search')->name('funcionario.search');
Route::get ('admin/funcionario/json-setor', 'FuncionarioController@setorSelect');
Route::resource('admin/funcionario', 'FuncionarioController')->middleware('auth')->middleware('check.admin');

Route::get ('admin/empresa', 'EmpresaController@index')->name('admin.empresa');
Route::get ('admin/empresa/search', 'EmpresaController@search')->name('empresa.search');
Route::resource ('admin/empresa', 'EmpresaController')->middleware('auth')->middleware('check.admin');

Route::get ('admin/equipamento', 'EquipamentoController@index')->name('admin.equipamento');
Route::get ('admin/equipamento/search', 'EquipamentoController@search')->name('equipamento.search');
Route::get ('admin/equipamento/json-onibus', 'EquipamentoController@onibusSelect');
Route::resource ('admin/equipamento', 'EquipamentoController')->middleware('auth')->middleware('check.admin');

Route::get ('admin/onibus', 'OnibusController@index')->name('admin.onibus');
Route::get ('admin/onibus/search', 'OnibusController@search')->name('onibus.search');
Route::resource ('admin/onibus', 'OnibusController')->middleware('auth')->middleware('check.admin');

Route::get ('admin/setor', 'SetorController@index')->name('admin.setor');
Route::get ('admin/setor/search', 'SetorController@search')->name('setor.search');
Route::resource ('admin/setor', 'SetorController')->middleware('auth')->middleware('check.admin');


/**
 * Rotas do menu TÉCNICO
 *  */
Route::get ('tecnico/nao-conformidade', 'NaoConformidadeController@index')->name('tecnico.naoconformidade');
Route::get ('tecnico/nao-conformidade/search', 'NaoConformidadeController@search')->name('nao-conformidade.search');
Route::get ('tecnico/nao-conformidade/json-onibus', 'NaoConformidadeController@onibusSelect');
Route::get ('tecnico/nao-conformidade/json-equipamento', 'NaoConformidadeController@equipamentoSelect');
Route::resource ('tecnico/nao-conformidade', 'NaoConformidadeController')->middleware('auth');

Route::get ('tecnico/acao-corretiva', 'CorretivaController@index')->name('tecnico.acaocorretiva');
Route::get ('tecnico/acao-corretiva/search', 'CorretivaController@search')->name('acao-corretiva.search');
Route::get ('tecnico/acao-corretiva/json-onibus', 'CorretivaController@onibusSelect');
Route::get ('tecnico/acao-corretiva/json-equipamento', 'CorretivaController@equipamentoSelect');
Route::resource ('tecnico/acao-corretiva', 'CorretivaController')->middleware('auth');

Route::get ('tecnico/acao-imediata', 'ImediataController@index')->name('tecnico.acaoimediata');
Route::get ('tecnico/acao-imediata/search', 'ImediataController@search')->name('acao-imediata.search');
Route::get ('tecnico/acao-imediata/json-onibus', 'ImediataController@onibusSelect');
Route::get ('tecnico/acao-imediata/json-equipamento', 'ImediataController@equipamentoSelect');
Route::get ('tecnico/acao-imediata/live-select', 'ImediataController@liveSelect')->name('acao-imediata.liveSelect');
Route::resource ('tecnico/acao-imediata', 'ImediataController')->middleware('auth');
