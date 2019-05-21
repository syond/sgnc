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
      <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo" value="{{ $onibus->modelo }}">
    </div>
    <div class="form-group">
      <label for="modelo">Placa</label>
      <input type="text" class="form-control" name="placa" placeholder="Placa" maxlength="7" value="{{ $onibus->placa }}">
    </div>
    <div class="form-group">
      <label for="serial">Chassi</label>
      <input type="text" class="form-control" name="chassi" placeholder="Chassi" maxlength="17" value="{{ $onibus->chassi }}">
    </div>
    <div class="form-group">
      <label for="serial">Número</label>
      <input type="text" class="form-control" name="numero" placeholder="Número" maxlength="5" value="{{ $onibus->numero }}">
    </div>
    <div class="form-group">
      <label for="ano">Ano</label>
      <input type="text" class="form-control" name="ano" placeholder="Ano" maxlength="4" value="{{ $onibus->ano }}">
    </div>
    <div class="form-group">
      <label for="empresa">Empresa</label>
      <select name="empresa_id" id="empresa_id" class="form-control" value="{{ $onibus->empresa_id }}">

        @foreach($empresas as $empresa)
          <option value="{{ $onibus->empresa_id }}">{{ $empresa->nome_fantasia }}</option>
        @endforeach
            
      </select>
    </div>        
    <button type="submit" class="btn btn-default">Enviar</button>
  </form>
  </div>

@endsection
