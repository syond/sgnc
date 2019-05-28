<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Funcionario;
use Auth;

class RelatorioController extends Controller
{
    public function index()
    {
        return view('sistema.relatorio.relatorio');
    }

    public function relatorioFuncionarioEmpresas()
    {
        //captura id do funcionário logado
        $funcionario_id = Auth::id();
        
        //encontra o usuário no banco e retorna o primeiro registro ( usei first() para não retornar como array )
        $funcionario = Funcionario::where('id', $funcionario_id)->get()->first();  
        //Outra forma de fazer (Não funcionou direito) -> $funcionario = Funcionario::find($funcionario_id)->get()->first();  

        //retorna todas as empresas cadastradas por esse usuário
        $empresa = $funcionario->empresa;
        
        //retorna para a view anterior com a variável $funcionario disponível para uso na view
        return back()->compact('funcionario');
    }
}
