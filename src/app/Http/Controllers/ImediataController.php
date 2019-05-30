<?php

namespace App\Http\Controllers;

use App\Imediata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Empresa;
use App\Equipamento;
use App\Onibus;
use App\Http\Requests\ImediataStoreRequest;
use Auth;

class ImediataController extends Controller
{

    public function index()
    {
        $imediatas = Imediata::listarJoinImediataEquipamento(5);

        return view('tecnico.imediata.index', compact('imediatas'));
    }


    public function create()
    {
        $empresas   = Empresa::all();

        return view('tecnico.imediata.create', compact('empresas'));
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

        $imediatas = Imediata::buscarImediataCadastrada($search, 5);
        
        
        if(count($imediatas) > 0)
        {
            return view('tecnico.imediata.index', compact('imediatas'));
        }
            else
            {
                return view('tecnico.imediata.index', compact('imediatas'))->withErrors("Nenhum registro encontrado.");
            } 
    }


    public function store(ImediataStoreRequest $request)
    {
        $dados = $request->validated();        

        $funcionario_id = Auth::id();

        $dados['funcionario_id']    = $funcionario_id;

        Imediata::create($dados);

        return redirect()->route('acao-imediata.index')->with('success', "Ação Imediata cadastrada com sucesso!");
    }


    public function edit($id)
    {
        $imediata = Imediata::find($id);

        return view('tecnico.imediata.edit', compact('imediata'));
    }


    public function update(ImediataStoreRequest $request, $id)
    {
        $imediata = Imediata::find($id)->update($request->all());

        return redirect()->route('acao-imediata.index')->with('success', 'Ação Imediata atualizada com sucesso!');
    }


    public function destroy($id)
    {
        Imediata::find($id)->delete();
        
        return back()->with('success', 'Ação Imediata deletada com sucesso!');
    }
}
