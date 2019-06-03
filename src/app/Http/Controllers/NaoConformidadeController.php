<?php

namespace App\Http\Controllers;

use App\NaoConformidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\NaoConformidadeStoreRequest;
use App\Funcionario;
use App\Empresa;
use App\Onibus;
use App\Equipamento;
use Auth;

class NaoConformidadeController extends Controller
{

    public function index()
    {
        $nao_conformidades = NaoConformidade::listarJoinNaoConformidadeEquipamentoFuncionario(5);

        //para a filtragem por técnico
        $funcionarios = Funcionario::listarTodos();

        return view('tecnico.naoconformidade.index', compact('nao_conformidades', 'funcionarios'));
    }


    public function create()
    {
        $empresas   = Empresa::all();

        return view('tecnico.naoconformidade.create', compact('empresas'));
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

    
    public function search(Request $request)
    {
        $search = $request->get('search');

        $nao_conformidade = NaoConformidade::buscarNaoConformidadeCadastrada($search, 5);
        
        
        if(count($nao_conformidade) > 0)
        {
            return view('tecnico.nao-conformidade.index', compact('nao_conformidade'));
        }
            else
            {
                return view('tecnico.nao-conformidade.index', compact('nao_conformidade'))->withErrors("Nenhum registro encontrado.");
            } 
    }

    public function store(NaoConformidadeStoreRequest $request)
    {
        $dados = $request->validated();        

        $funcionario_id = Auth::id();

        $dados['funcionario_id'] = $funcionario_id;

        NaoConformidade::create($dados);

        return redirect()->route('nao-conformidade.index')->with('success', "Não Conformidade cadastrada com sucesso!");
    }


    public function edit($id)
    {
        $nao_conformidade = NaoConformidade::find($id);

        return view('tecnico.naoconformidade.edit', compact('nao_conformidade'));
    }


    public function update(NaoConformidadeStoreRequest $request, $id)
    {
        $nao_conformidade = NaoConformidade::find($id)->update($request->all());

        return redirect()->route('nao-conformidade.index')->with('success', 'Não Conformidade atualizada com sucesso!');
    }


    public function destroy($id)
    {
        NaoConformidade::find($id)->delete();
        
        return back()->with('success', 'Não Conformidade deletada com sucesso!');
    }
}
