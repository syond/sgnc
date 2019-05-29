@extends('layouts/layout')

@section('title', 'Cadastro de Setor')

@section('nav-map-name', 'Cadastro de Setor')
		    

@section('content')

  <h3 id="forms-example" class="">Cadastro de Setor</h3>
  <hr>
  <form method="POST" action="{{ route('setor.store') }}">

      @csrf

    <div class="form-group">
      <label for="fabrica">Nome</label>
      <input type="text" class="form-control" name="nome" id="nome" maxlength="50" >
    </div>
    

    <div class="form-group">
      <label for="empresa">Empresa</label>


      <select name="empresa_id" id="empresa_id" class="form-control">
        <option value="0" disabled selected>Selecione a Empresa</option>
        @foreach($empresas as $empresa)
          <option value="{{ $empresa->id }}">{{ $empresa->nome_fantasia }}</option>
        @endforeach   
      </select>

      
    </div>    
        
    <button type="submit" class="btn btn-default">Enviar</button>
  </form>
  </div>

@endsection
