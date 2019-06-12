<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

//importando model
use App\Funcionario;
use App\Empresa;
use App\Setor;

//importando o Request personalizado
use App\Http\Requests\FuncionarioStoreRequest;


class FuncionarioController extends Controller
{

    public function index()
    {
        $funcionarios = Funcionario::orderBy('created_at', 'DESC')->get();

        return view('administrador.funcionario.index', compact('funcionarios'));
    }


    public function create()
    {
        $empresas = Empresa::all();

        return view('administrador.funcionario.create', compact('empresas'));
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


    /**
     * Função para o <SELECT> dinâmico no campo SETOR
     */
    public function setorSelect()
    {
        $empresa_id = Input::get('empresa_id');

        $setor = Setor::where('empresa_id', $empresa_id)->get();

        return response()->json($setor);
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

        $empresas = Empresa::listarTodos();

        $setores = Setor::listarTodos();

        return view('administrador.funcionario.edit', compact('funcionario', 'empresas', 'setores'));
    }


    public function update(FuncionarioStoreRequest $request, $id)
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
