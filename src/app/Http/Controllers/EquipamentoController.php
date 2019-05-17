<?php

namespace App\Http\Controllers;

use App\Equipamento;
use Illuminate\Http\Request;
use App\Http\Requests\EquipamentoStoreRequest;
use App\Funcionario;
use Auth;

class EquipamentoController extends Controller
{

    public function index()
    {
        $equipamento = Equipamento::orderBy('created_at', 'DESC')->paginate(5);

        return view('administrador.equipamento.index', compact('equipamento'));
    }


    public function create()
    {
        return view('administrador.equipamento.create');
    }


    public function search(Request $request)
    {
        $search = $request->get('search');

        $equipamento = Equipamento::where('fabrica', 'like', '%'.$search.'%')
            ->orWhere('modelo', 'like', '%'.$search.'%')
            ->orWhere('serial', 'like', '%'.$search.'%')
            ->orWhere('ano', 'like', '%'.$search.'%')
            ->orderBy('created_at', 'DESC')
            ->paginate(5);

        return view('administrador.equipamento.index', compact('equipamento'));
    }


    public function store(EquipamentoStoreRequest $request)
    {
        $dados = $request->validated();        

        $funcionario_id = Auth::id();

        $dados['funcionario_id'] = $funcionario_id;

        Equipamento::create($dados);

        return back()->with('success', "Equipamento cadastrado com sucesso!");
    }


    public function show(Equipamento $equipamento)
    {
        //
    }


    public function edit($id)
    {
        $equipamento = Equipamento::find($id);

        return view('administrador.equipamento.edit', compact('equipamento'));
    }


    public function update(EquipamentoStoreRequest $request, $id)
    {
        $equipamento = Equipamento::find($id);

        $equipamento->update([
            'fabrica'   =>  $request->input('fabrica'),
            'modelo'    =>  $request->input('modelo'),
            'serial'    =>  $request->input('serial'),
            'ano'       =>  $request->input('ano'),
        ]);

        return back()->with('success', 'Empresa atualizada com sucesso!');
    }


    public function destroy($id)
    {
        Equipamento::find($id)->delete();
        
        return back()->with('success', 'Empresa deletada com sucesso!');
    }
}
