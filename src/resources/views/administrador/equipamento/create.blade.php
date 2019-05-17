@extends('layouts/layout')

@section('title', 'Cadastro de Equipamento')

@section('nav-map-name', 'Cadastro de Equipamento')
		    

@section('content')

    <h3 id="forms-example" class="">Cadastro de Equipamento</h3>
 
    <hr>

    <form method="POST" action="{{ route('equipamento.store') }}">

      @csrf


      <div class="form-group">
        <label for="fabrica">Fábrica</label>
        <input type="text" class="form-control" name="fabrica" id="fabrica" placeholder="Fábrica">
      </div>
      <div class="form-group">
        <label for="modelo">Modelo</label>
        <input type="text" class="form-control" name="modelo" placeholder="Modelo" maxlength="50">
      </div>
      <div class="form-group">
        <label for="serial">Serial</label>
        <input type="text" class="form-control" name="serial" placeholder="Serial" maxlength="50">
      </div>
      <div class="form-group">
        <label for="ano">Ano</label>
        <input type="text" class="form-control" name="ano" placeholder="Ano" maxlength="4">
      </div>
      <div class="form-group">
        <label for="empresa">Empresa</label>
        <select name="empresa" class="form-control">
          <option value="0">Empresa X</option>
          <option value="1">Empresa Y</option>
        </select>
      </div>
      <div class="form-group">
        <label for="onibus">Onibus</label>
        <select name="onibus" class="form-control">
          <option value="0">Ônibus X</option>
          <option value="1">Ônibus Y</option>
        </select>
      </div>
      
      
      <button type="submit" class="btn btn-default">Enviar</button>
      </form>
    </div>

@endsection
