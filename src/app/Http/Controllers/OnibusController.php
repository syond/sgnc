<?php

namespace App\Http\Controllers;

use App\Onibus;
use Illuminate\Http\Request;
use App\Http\Requests\OnibusStoreRequest;
use App\Funcionario;
use App\Empresa;
use Auth;

class OnibusController extends Controller
{


    public function index()
    {
        $onibus = Onibus::listarJoinOnibusEmpresa(5);

        return view('administrador.onibus.index', compact('onibus'));
    }


    public function create()
    {
        $empresas = Empresa::all();

        return view('administrador.onibus.create', compact('empresas'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');


        $onibus = Onibus::buscarOnibusCadastrado($search, 5);
        
        
        if(count($onibus) > 0)
        {
            return view('administrador.onibus.index', compact('onibus'));
        }
            else
            {
                return view('administrador.onibus.index', compact('onibus'))->withErrors("Nenhum registro encontrado.");
            }    
    }


    public function store(OnibusStoreRequest $request)
    {
        $dados = $request->validated();        

        $funcionario_id = Auth::id();

        $dados['funcionario_id'] = $funcionario_id;

        $dados['placa'] = str_replace("-", "", $request->placa);
        
        Onibus::create($dados);

        return redirect()->route('onibus.index')->with('success', "Ônibus cadastrado com sucesso!");
    }
    

    public function edit($id)
    {
        $onibus = Onibus::find($id);

        return view('administrador.onibus.edit', compact('onibus'));
    }


    public function update(OnibusStoreRequest $request, $id)
    {
        $onibus = Onibus::find($id)->update($request->all());

        return redirect()->route('onibus.index')->with('success', 'Ônibus atualizado com sucesso!');
    }


    public function destroy($id)
    {
        Onibus::find($id)->delete();
        
        return back()->with('success', 'Ônibus deletado com sucesso!');
    }
}
