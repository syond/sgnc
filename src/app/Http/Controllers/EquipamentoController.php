<?php

namespace App\Http\Controllers;

use App\Equipamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\EquipamentoStoreRequest;
use App\Funcionario;
use App\Empresa;
use App\Onibus;
use Auth;

class EquipamentoController extends Controller
{

    public function index()
    {
        $equipamento = Equipamento::listarJoinEquipamentoOnibus(5);

        return view('administrador.equipamento.index', compact('equipamento'));
    }


    public function create(Request $request)
    {
        //Para usar no SELECT
        $empresas   = Empresa::all();

        return view('administrador.equipamento.create', compact('empresas'));
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


    public function search(Request $request)
    {
        $search = $request->get('search');

        $equipamento = Equipamento::buscarEquipamentoCadastrado($search, 5);
        
        
        if(count($equipamento) > 0)
        {
            return view('administrador.equipamento.index', compact('equipamento'));
        }
            else
            {
                return view('administrador.equipamento.index', compact('equipamento'))->withErrors("Nenhum registro encontrado.");
            } 
    }


    public function store(EquipamentoStoreRequest $request)
    {
        $dados = $request->validated();        

        $funcionario_id = Auth::id();

        $dados['funcionario_id']    = $funcionario_id;
        $dados['onibus_id']    = $request->onibus;

        Equipamento::create($dados);

        return redirect()->route('equipamento.index')->with('success', "Equipamento cadastrado com sucesso!");
    }


    public function edit($id)
    {
        $equipamento = Equipamento::find($id);

        //Para usar no SELECT
        $empresas   = Empresa::all();
        //

        //Solução para o DISABLE SELECT
        $equipamento_onibus = Onibus::find($equipamento->onibus_id);
        $equipamento_empresa = Empresa::find($equipamento_onibus->empresa_id);
        //Não ta atualizando quando altero a empresa. Tentar usar belongsTo()

        return view('administrador.equipamento.edit', compact('equipamento', 'empresas', 'equipamento_empresa'));
    }


    public function update(EquipamentoStoreRequest $request, $id)
    {
        $equipamento = Equipamento::find($id)->update($request->all());

        return redirect()->route('equipamento.index')->with('success', 'Empresa atualizada com sucesso!');
    }


    public function destroy($id)
    {
        Equipamento::find($id)->delete();
        
        return back()->route('equipamento.index')->with('success', 'Empresa deletada com sucesso!');
    }
}
