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
        /**
         * Retorna todos os registros de EMPRESA ordenados decrescente pelo "created_at",
         * listando apenas 5 registros por tela.
         *  */
        $empresa = Empresa::orderBy('created_at', 'DESC')->paginate(5);

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

        //Teste para verificar se o usuário está logado e é administrador
        if(Auth::check())
        {
            //Capturando ID do usuário logado
            $usuario_id = Auth::id();

            $nivel = Funcionario::select('nivel')->where('id', $usuario_id)->get();           

            if($nivel = '1')
            {

                Empresa::create([
                    'cnpj'              => str_replace(["/", ".", "-"], "", $request->cnpj),
                    'nome_fantasia'     => $request->nome_fantasia,
                    'razao_social'      => $request->razao_social,
                    'administrador_id'  => $usuario_id,
                ]);

                return back()->with('success', "Empresa cadastrada com sucesso!");

            }elseif($nivel = '0'){

                return "Você não tem permissão para executar essa tarefa.";

            }

        }else{

            return "Você precisa estar logado para realizar essa terefa!";

        }
        
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
