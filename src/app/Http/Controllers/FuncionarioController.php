<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Funcionario;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('funcionario.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionario.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $validarDados = $request->validate([
            'txt_nome'=>'required|max:30',
            'txt_email'=> 'max:50',
            'txt_matricula' => 'required|numeric',
            'txt_senha'=>'required',
            'foto'
          ]);
        */

         /*    
          $funcionario = new Funcionario([
            'nome' => $request->get('txt_nome'),
            'email'=> $request->get('txt_email'),
            'matricula'=> $request->get('txt_matricula'),
            'senha'=> $request->get('txt_senha')
          ]);
            
          $funcionario->save();
            */
          //return redirect('/funcionario')->with('success', 'Stock has been added');
          


          



           //ERRO: 1364 Field 'matricula' doesn't have a default value
          //$funcionario = Funcionario::create($validarDados);
            

          
          $funcionario = Funcionario::create([
            'nome'      => $request->get('txt_nome'),
            'email'     => $request->get('txt_email'),
            'matricula' => $request->get('txt_matricula'),
            'senha'     => $request->get('txt_senha'),
            'foto'      => 'null'
          ]);

          $funcionario->save();
 
          //dd($funcionario->all());

          return redirect('/funcionario')->with('success', 'Sucesso!');

          //echo "DEU CERTO";
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('funcionario.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('funcionario.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
