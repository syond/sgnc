@extends('layouts/layout')

@section('title', 'Editar Ônibus')

@section('nav-map-name', 'Editar Ônibus')
		    

@section('content')

  <h3 id="forms-example" class="">Editar Ônibus</h3>
  <hr>
  <form method="POST" action="{{ route('onibus.update', $onibus->id) }}">

      @csrf
      @method('PATCH')

    <div class="form-group">
      <label for="fabrica">Modelo</label>
      <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo" value="{{ old('onibus', $onibus->modelo) }}">
    </div>
    <div class="form-group">
      <label for="modelo">Placa</label>
      <input type="text" class="form-control" name="placa" maxlength="7" value="{{ old('onibus', $onibus->placa) }}">
    </div>
    <div class="form-group">
      <label for="serial">Chassi</label>
      <input type="text" class="form-control" name="chassi" maxlength="17" value="{{ old('onibus', $onibus->chassi) }}">
    </div>
    <div class="form-group">
      <label for="serial">Número</label>
      <input type="text" class="form-control" name="numero" maxlength="8" value="{{ old('onibus', $onibus->numero) }}">
    </div>
    <div class="form-group">
      <label for="ano">Ano</label>
      <input type="text" class="form-control" name="ano" maxlength="4" value="{{ old('onibus', $onibus->ano) }}">
    </div>


    <div class="form-group">
      <label for="empresa">Empresa</label>
      
      
      <select name="empresa_id" id="empresa_id" class="form-control">
        <option value="0" disabled selected>{{ $onibus->empresa->nome_fantasia }}</option>
        @foreach($onibus->empresa->get() as $empresa)
          <option value="{{ $empresa->id }}">{{ $empresa->nome_fantasia }}</option>
        @endforeach  
      </select>

      
    </div>
    <button type="submit" class="btn btn-default">Enviar</button>
  </form>
  </div>

@endsection
