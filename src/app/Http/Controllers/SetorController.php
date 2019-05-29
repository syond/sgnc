<?php

namespace App\Http\Controllers;

use App\Setor;
use Illuminate\Http\Request;
use App\Http\Requests\SetorStoreRequest;
use App\Empresa;
use Auth;

class SetorController extends Controller
{

    public function index()
    {
        $setores = Setor::listarJoinSetorEmpresa(5);

        return view('administrador.setor.index', compact('setores'));
    }


    public function create()
    {
        $empresas   = Empresa::all();

        return view('administrador.setor.create', compact('empresas'));
    }


    public function search(Request $request)
    {
        $search = $request->get('search');

        $setores = Setor::buscarSetorCadastrado($search, 5);
        
        
        if(count($setores) > 0)
        {
            return view('administrador.setor.index', compact('setores'));
        }
            else
            {
                return view('administrador.setor.index', compact('setores'))->withErrors("Nenhum registro encontrado.");
            } 
    }


    public function store(SetorStoreRequest $request)
    {
        $dados = $request->validated();        

        $funcionario_id = Auth::id();

        $dados['funcionario_id']    = $funcionario_id;
        $dados['empresa_id']        = $request->empresa_id;

        Setor::create($dados);

        return redirect()->route('setor.index')->with('success', "Equipamento cadastrado com sucesso!");
    }


    public function edit($id)
    {
        $setor = Setor::find($id);

        return view('administrador.setor.edit', compact('setor'));
    }


    public function update(SetorStoreRequest $request, $id)
    {
        $setor = Setor::find($id)->update($request->all());

        return redirect()->route('setor.index')->with('success', 'Empresa atualizada com sucesso!');
    }


    public function destroy($id)
    {
        Setor::find($id)->delete();
        
        return back()->route('setor.index')->with('success', 'Empresa deletada com sucesso!');
    }
}
