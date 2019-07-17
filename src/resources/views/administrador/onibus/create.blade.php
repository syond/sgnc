@extends('layouts/layout')

@section('title', 'Cadastro de Ônibus')

@section('nav-map-name', 'Cadastro de Ônibus')
		    

@section('content')

  <h3 id="forms-example" class="">Cadastro de Ônibus</h3>
  <hr>
  <form method="POST" action="{{ route('onibus.store') }}">

      @csrf

    <div class="form-group">
      <label for="fabrica">Modelo</label>
      <input type="text" class="form-control" name="modelo" id="modelo" >
    </div>
    <div class="form-group">
      <label for="modelo">Placa</label>
      <input type="text" class="form-control" name="placa" id="placa" maxlength="7" >
    </div>
    <div class="form-group">
      <label for="serial">Chassi</label>
      <input type="text" class="form-control" name="chassi" maxlength="17" >
    </div>
    <div class="form-group">
      <label for="serial">Número</label>
      <input type="text" class="form-control" name="numero" maxlength="8" >
    </div>
    <div class="form-group">
      <label for="ano">Ano</label>
      <input type="text" class="form-control" name="ano" maxlength="4" >
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

  
  <script type="text/javascript">

    $(document).ready(function(){
      $("#placa").mask("AAA-0000")
    })

  </script>

@endsection
