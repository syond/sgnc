<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//importando model
use App\Funcionario;
//importando o Request personalizado
use App\Http\Requests\FuncionarioStoreRequest;


class FuncionarioController extends Controller
{

    public function index()
    {
        $funcionarios = Funcionario::all();

        return view('administrador.funcionario.index', compact('funcionarios'));
    }


    public function create()
    {
        return view('administrador.funcionario.create');
    }


    public function search(Request $request)
    {
        $search = $request->get('search');

        $funcionario = Funcionario::buscarFuncionarioCadastrado($search, 5);
        
        
        if(count($funcionario) > 0)
        {
            return view('funcionario.index', compact('funcionario'));
        }
            else
            {
                return view('administrador.funcionario.index', compact('funcionario'))->withErrors("Nenhum registro encontrado.");
            } 
    }


    public function store(FuncionarioStoreRequest $request)
    {

        $dados = $request->validated();
          
        Funcionario::create($dados);

        return redirect()->route('funcionario.index')->with('success', 'Funcionário cadastrado com sucesso!');
            
    }


    public function edit($id)
    {
        $funcionario = Funcionario::find($id);

        return view('administrador.funcionario.edit', compact('funcionario'));
    }


    public function update(SetorStoreRequest $request, $id)
    {
        $funcionario = Funcionario::find($id)->update($request->all());

        return redirect()->route('funcionario.index')->with('success', 'Funcionario atualizado com sucesso!');
    }


    public function destroy($id)
    {
        Funcionario::find($id)->delete();
        
        return back()->with('success', 'Funcionario deletado com sucesso!');
    }
}
