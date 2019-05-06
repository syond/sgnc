<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;

//importando o Request personalizado
use App\Http\Requests\EmpresaStoreRequest;


class EmpresaController extends Controller
{

    public function index()
    {
        /**
         * Importante para reconhecer a variável $empresa
         * nas Views, junto com o compact(),
         * e trabalhar com os métodos Show/Edit/Destroy.
         */
        $empresa = Empresa::all();

        return view('administrador.empresa.index', compact('empresa'));
    }


    public function create()
    {
        return view('administrador.empresa.create');
    }


    public function store(EmpresaStoreRequest $request)
    {
        $dados = $request->validated();

        Empresa::create($dados);

        return redirect()->route('empresa.index')->with('success', "Empresa cadastrada com sucesso!");
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
