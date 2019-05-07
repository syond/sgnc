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
         * Importante para reconhecer a variável $empresa
         * nas Views, junto com o compact(),
         * e trabalhar com os métodos Show/Edit/Destroy.
         */
        $empresa = Empresa::orderBy('created_at', 'DESC')->paginate(5);

        return view('administrador.empresa.index', compact('empresa'));
    }


    public function create()
    {
        return view('administrador.empresa.create');
    }

    
    /**
     * Método para busca de dados cadastrados
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
        
        //Query para busca no banco de dados
        $empresa = Empresa::where('cnpj', 'like', '%'.$search.'%')
            ->orWhere('nome_fantasia', 'like', '%'.$search.'%')
            ->orWhere('razao_social', 'like', '%'.$search.'%')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

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
                    'cnpj'              => $request->cnpj,
                    'nome_fantasia'     => $request->nome_fantasia,
                    'razao_social'      => $request->razao_social,
                    'administrador_id'  => $usuario_id,
                ]);

                return redirect()->route('empresa.index')->with('success', "Empresa cadastrada com sucesso!");

            }elseif($nivel = '0'){

                return "Você não tem permissão para executar essa tarefa.";

            }

        }else{

            return "Você precisa estar logado para realizar essa terefa!";

        }
        
    }


    public function show(Empresa $empresa)
    {
        //
    }


    public function edit($id)
    {
        $empresa = Empresa::find($id);

        return view('administrador.empresa.edit', compact('empresa'));
        //return redirect()->route('empresa.edit', compact('empresa'))->with('success', "Empresa editada com sucesso!");
    }


    public function update(EmpresaStoreRequest $request, $id)
    {
        $empresa = Empresa::find($id);

        $empresa->update([
            'cnpj'          =>  $request->input('cnpj'),
            'nome_fantasia' =>  $request->input('nome_fantasia'),
            'razao_social'  =>  $request->input('razao_social'),
        ]);

        return redirect()->route('empresa.index')->with('success', 'Empresa atualizada com sucesso!');
    }


    public function destroy($id)
    {
        Empresa::find($id)->delete();
        
        return redirect()->route('empresa.index')->with('success', 'Empresa deletada com sucesso!');
    }
}
