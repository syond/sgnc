<?php

namespace App\Http\Controllers;

use App\Corretiva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CorretivaStoreRequest;
use App\Funcionario;
use App\Empresa;
use App\Onibus;
use App\Setor;
use App\Equipamento;
use App\Imediata;
use Auth;

class CorretivaController extends Controller
{

    public function index()
    {
        $corretivas = Corretiva::listarTodos(5);

        //para a filtragem por técnico
        $funcionarios = Funcionario::listarTodos();

        return view('tecnico.corretiva.index', compact('corretivas', 'funcionarios'));
    }


    public function create()
    {
        $empresas   = Empresa::all();

        return view('tecnico.corretiva.create', compact('empresas'));
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
     * Função para o <SELECT> dinâmico no campo Não Conformidade
     */
    public function imediataSelect()
    {
        $equipamento_id = Input::get('equipamento_id');

        $imediata_id = Imediata::where('equipamento_id', $equipamento_id)->get();

        return response()->json($imediata_id);
    }

    
    public function search(Request $request)
    {
        $search = $request->get('search');

        $corretivas = Corretiva::buscarCorretivaCadastrada($search, 5);
        
        
        if(count($corretivas) > 0)
        {
            return view('tecnico.corretiva.index', compact('corretivas'));
        }
            else
            {
                return view('tecnico.corretiva.index', compact('corretivas'))->withErrors("Nenhum registro encontrado.");
            } 
    }


    public function store(CorretivaStoreRequest $request)
    {
        $dados = $request->validated();        

        $funcionario_id = Auth::id();

        $dados['funcionario_id'] = $funcionario_id;

        Corretiva::create($dados);

        return redirect()->route('acao-corretiva.index')->with('success', "Ação Corretiva cadastrada com sucesso!");
    }


    public function edit($id)
    {
        $corretiva = Corretiva::find($id);

        return view('tecnico.corretiva.edit', compact('corretiva'));
    }


    public function update(CorretivaStoreRequest $request, $id)
    {
        $corretiva = Corretiva::find($id)->update($request->all());

        return redirect()->route('acao-corretiva.index')->with('success', 'Ação Corretiva atualizada com sucesso!');
    }


    public function destroy($id)
    {
        Corretiva::find($id)->delete();
        
        return back()->with('success', 'Ação Corretiva deletada com sucesso!');
    }
}
