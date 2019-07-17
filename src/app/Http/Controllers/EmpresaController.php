<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresaStoreRequest;
use App\Funcionario;
use Auth;


class EmpresaController extends Controller
{

    public function index()
    {      
        //captura o id do usuário logado
        $funcionario_id = Auth::id();

        $empresa = Empresa::listarJoinEmpresaFuncionario(5);
        
        //Retorna view INDEX passando $empresa por COMPACT() para acesso nas views.
        return view('administrador.empresa.index', compact('empresa'));
    }


    public function create()
    {
        //Retorna formulário de cadastro de empresa
        return view('administrador.empresa.create');
    }

    
    /**
     * Método para busca de dados cadastrados
     */
    public function search(Request $request)
    {
        //Retorna tudo que for digitado no campo de Busca
        $search = $request->get('search');

        $empresa = Empresa::buscarEmpresaCadastrada($search, 5);
        
        if(count($empresa) > 0)
        {
            return view('administrador.empresa.index', compact('empresa'));
        }
            else
            {
                return view('administrador.empresa.index', compact('empresa'))->withErrors("Nenhum registro encontrado.");
            } 
    }


    public function store(EmpresaStoreRequest $request)
    {
            $dados = $request->validated();        


            //Implementa o atributo "funcionario_id" diretamente com o id do usuário logado
            $dados['cnpj'] = str_replace(["/", ".", "-"], "", $request->cnpj);
            $dados['funcionario_id'] = Auth::id();

            Empresa::create($dados);

            return redirect()->route('empresa.index')->with('success', "Empresa cadastrada com sucesso!");
        
    }


    public function edit($id)
    {
        //Query para encontrar a empresa pelo ID
        $empresa = Empresa::find($id);

        return view('administrador.empresa.edit', compact('empresa'));
        //return redirect()->route('empresa.edit', compact('empresa'))->with('success', "Empresa editada com sucesso!");
    }


    public function update(EmpresaStoreRequest $request, $id)
    {    
        
        $empresa = Empresa::find($id);

        /**
         * Captura os dados preenchidos no formulário
         * e atualiza no respectivo registro no banco.         * 
         */   
        $empresa->update([
            'cnpj'          =>  str_replace(["/", ".", "-"], "", $request->input('cnpj')),
            'nome_fantasia' =>  $request->input('nome_fantasia'),
            'razao_social'  =>  $request->input('razao_social'),
        ]);

        return redirect()->route('empresa.index')->with('success', 'Empresa atualizada com sucesso!');
    }


    public function destroy($id)
    {
        //Query para encontrar a empresa pelo ID e deletar a mesma
        Empresa::find($id)->delete();
        
        return back()->with('success', 'Empresa deletada com sucesso!');
    }
}
