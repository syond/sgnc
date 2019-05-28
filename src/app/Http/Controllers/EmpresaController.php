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

        
        //$funcionario = Funcionario::where('id', $funcionario_id)->get()->first();        
        
        //Ordena decrescente pelo "created_at", listando apenas 5 registros por tela.
        $empresa = Empresa::orderBy('created_at', 'DESC')->paginate(5);


        $empresas = Empresa::where('funcionario_id', $funcionario_id)->get()->first();


        
        //$funcionario = $empresas->funcionario;


        
        //Retorna view INDEX passando $empresa por COMPACT() para acesso nas views.
        return view('administrador.empresa.index', compact('empresa', 'empresas'));
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
        
        /**
         * Query para busca no banco de dados comparando com o que foi digitado
         * no campo de Busca e retornando apenas 5 registros por página
         *  */
        $empresa = Empresa::where('cnpj', 'like', '%'.$search.'%')
            ->orWhere('nome_fantasia', 'like', '%'.$search.'%')
            ->orWhere('razao_social', 'like', '%'.$search.'%')
            ->orderBy('created_at', 'DESC')
            ->paginate(5);

        return view('administrador.empresa.index', compact('empresa'));
    }


    public function store(EmpresaStoreRequest $request)
    {
            $dados = $request->validated();        

            //Capturando ID do usuário logado
            $funcionario_id = Auth::id();

            //Implementa o atributo "funcionario_id" diretamente com o id do usuário logado
            $dados['funcionario_id'] = $funcionario_id;
            $dados['cnpj'] = str_replace(["/", ".", "-"], "", $request->cnpj);

            Empresa::create($dados);

            return back()->with('success', "Empresa cadastrada com sucesso!");
        
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
            'cnpj'          =>  $request->input('cnpj'),
            'nome_fantasia' =>  $request->input('nome_fantasia'),
            'razao_social'  =>  $request->input('razao_social'),
        ]);

        return back()->with('success', 'Empresa atualizada com sucesso!');
    }


    public function destroy($id)
    {
        //Query para encontrar a empresa pelo ID e deletar a mesma
        Empresa::find($id)->delete();
        
        return back()->with('success', 'Empresa deletada com sucesso!');
    }
}
