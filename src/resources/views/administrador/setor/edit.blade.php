@extends('layouts/layout')

@section('title', 'Editar Setor')

@section('nav-map-name', 'Editar Setor')
		    

@section('content')

  <h3 id="forms-example" class="">Editar Setor</h3>
  <hr>
  <form method="POST" action="{{ route('setor.update', $setor->id) }}">

    @csrf
    @method('PATCH')

    <div class="form-group">
      <label for="fabrica">Nome</label>
      <input type="text" class="form-control" name="nome" id="nome" maxlength="50" value="{{ old('setores', $setor->nome) }}">
    </div>
    

    <div class="form-group">
      <label for="empresa">Empresa</label>


      <select name="empresa_id" id="empresa_id" class="form-control">
        <option value="0" disabled selected>{{ $setor->empresa->nome_fantasia }}</option>
        @foreach($setor->empresa->get() as $empresa)
          <option value="{{ $empresa->id }}">{{ $empresa->nome_fantasia }}</option>
        @endforeach   
      </select>

      
    </div>    
        
    <button type="submit" class="btn btn-default">Enviar</button>
  </form>
  </div>

@endsection
