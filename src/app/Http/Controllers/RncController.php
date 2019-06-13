<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\RncStoreRequest;
use App\Funcionario;
use App\Empresa;
use App\Corretiva;
use App\Equipamento;
use App\Imediata;
use App\NaoConformidade;
use App\Onibus;
use App\Setor;
use App\Rnc;
use Auth;

class RncController extends Controller
{
    public function index()
    {
        $rnc = Rnc::listarTodos(5);


       
        //dd($tecnico = Rnc::listarTecnicoDoRelatorioPeloId());
        /* dd($supervisor = Rnc::listarSupervisorDoRelatorioPeloId()
                ->filter(function($sup){
                            return $sup->pin != '';})
                ->where('nivel', 1)); */

        //para a filtragem por técnico
        $funcionarios = Funcionario::listarTodos();

        return view('sistema.rnc.index', compact('rnc', 'funcionarios'));
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

    public function create()
    {
        $empresas   = Empresa::all();

        return view('sistema.rnc.create', compact('empresas'));
    }


    public function store(RncStoreRequest $request)
    {
        $dados = $request->validated();
        
        $funcionario_id = Auth::id();
        
        $dados['funcionario_id'] = $funcionario_id;

        Rnc::create($dados);

        return redirect()->route('rnc.relatorio')->with('success', "RNC cadastrado com sucesso!");
    }

    public function destroy($id)
    {
        Rnc::find($id)->delete();
        
        return back()->with('success', 'RNC deletado com sucesso!');
    }


    public function gerarRelatorio(Request $request, $id)
    {

        $de_data = Rnc::where('de_data', $de);


        dd($ate_data = Rnc::where('ate_data', $ate)->get());


        $setor = $request->input('setor_id');

        $nao_conformidades = NaoConformidade::where('setor_id', $setor)->whereBetween('created_at', [$de, $ate])->get();

        return view('sistema.rnc.relatorio', compact('nao_conformidades'));
    }


    public function search(Request $request)
    {
        /* $search = $request->get('search');

        $nao_conformidade = NaoConformidade::buscarNaoConformidadeCadastrada($search, 5);
        
        
        if(count($nao_conformidade) > 0)
        {
            return view('tecnico.nao-conformidade.index', compact('nao_conformidade'));
        }
            else
            {
                return view('tecnico.nao-conformidade.index', compact('nao_conformidade'))->withErrors("Nenhum registro encontrado.");
            }  */
    }



    /**
     * Função para o <SELECT> dinâmico no campo Onibus
     */
    public function onibusSelect()
    {
        $empresa_id = Input::get('empresa_id');

        $onibus = Onibus::where('empresa_id', $empresa_id)->get();

        return response()->json($onibus);
    }

    /**
     * Função para o <SELECT> dinâmico no campo Equipamento
     */
    public function equipamentoSelect()
    {
        $onibus_id = Input::get('onibus_id');

        $equipamento = Equipamento::where('onibus_id', $onibus_id)->get();

        return response()->json($equipamento);
    }


    /**
     * Função para o <SELECT> dinâmico no campo Setor
     */
    public function setorSelect()
    {
        $empresa_id = Input::get('empresa_id');

        $setor = Setor::where('empresa_id', $empresa_id)->get();

        return response()->json($setor);
    }


    /**
     * Função para o <SELECT> dinâmico no campo Setor
     */
    public function naoConformidadeSelect()
    {
        $equipamento_id = Input::get('equipamento_id');

        $nao_conformidade = NaoConformidade::where('equipamento_id', $equipamento_id)->get();

        return response()->json($nao_conformidade);
    }


    /**
     * Função para o <SELECT> dinâmico no campo Setor
     */
    public function imediataSelect()
    {
        $equipamento_id = Input::get('equipamento_id');

        $imediata = Imediata::where('equipamento_id', $equipamento_id)->get();

        return response()->json($imediata);
    }


    /**
     * Função para o <SELECT> dinâmico no campo Setor
     */
    public function corretivaSelect()
    {
        $equipamento_id = Input::get('equipamento_id');

        $corretiva = Corretiva::where('equipamento_id', $equipamento_id)->get();

        return response()->json($corretiva);
    }



}
