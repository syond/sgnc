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
        return view('administrador.funcionario.index');
    }


    public function create()
    {
        return view('administrador.funcionario.create');
    }


    public function store(FuncionarioStoreRequest $request)
    {

        $dados = $request->validated();
          
        Funcionario::create($dados);

        return redirect('/admin/funcionario')->with('success', 'Sucesso!');
            
    }


    public function show($id)
    {
        return view('funcionario/listar');
    }


    public function edit($id)
    {
        return view('funcionario/editar');
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
