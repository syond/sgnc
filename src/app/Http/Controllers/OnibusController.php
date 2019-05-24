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
        $onibus_empresa = Empresa::join('onibus', 'onibus.empresa_id', 'empresas.id')->paginate(5);

        //dd($onibus_empresa);

        $onibus = Onibus::all();

        //$onibus_empresa = Onibus::join('empresas', 'empresas.id', 'onibus.empresa_id')->paginate(5);

        return view('administrador.onibus.index', compact('onibus', 'onibus_empresa'));
    }


    public function create()
    {
        $empresas = Empresa::all();

        return view('administrador.onibus.create', compact('empresas'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $onibus = Onibus::where('modelo', 'like', '%'.$search.'%')
            ->orWhere('placa', 'like', '%'.$search.'%')
            ->orWhere('chassi', 'like', '%'.$search.'%')
            ->orWhere('numero', 'like', '%'.$search.'%')
            ->orWhere('ano', 'like', '%'.$search.'%')
            ->orderBy('created_at', 'DESC')
            ->paginate(5);

        return view('administrador.onibus.index', compact('onibus'));
    }


    public function store(OnibusStoreRequest $request)
    {
        $dados = $request->validated();        

        $funcionario_id = Auth::id();

        $dados['funcionario_id'] = $funcionario_id;

        $dados['placa'] = str_replace("-", "", $request->placa);
        
        Onibus::create($dados);

        return back()->with('success', "Onibus cadastrado com sucesso!");
    }


    public function show(Onibus $onibus)
    {
        //
    }


    public function edit($id)
    {
        $onibus = Onibus::find($id);

        return view('administrador.onibus.edit', compact('onibus'));
    }


    public function update(OnibusStoreRequest $request, $id)
    {
        $onibus = Onibus::find($id);

        $onibus->update([
            'modelo'        =>  $request->input('modelo'),
            'placa'         =>  $request->input('placa'),
            'chassi'        =>  $request->input('chassi'),
            'numero'        =>  $request->input('numero'),
            'ano'           =>  $request->input('ano'),
            'empresa_id'    =>  $request->input('empresa_id'),
        ]);

        return back()->with('success', 'Ônibus atualizado com sucesso!');
    }


    public function destroy($id)
    {
        Onibus::find($id)->delete();
        
        return back()->with('success', 'Ônibus deletado com sucesso!');
    }
}
