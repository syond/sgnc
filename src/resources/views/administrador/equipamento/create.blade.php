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
      <input type="text" class="form-control" name="fabrica" id="fabrica">
    </div>
    <div class="form-group">
      <label for="modelo">Modelo</label>
      <input type="text" class="form-control" name="modelo" maxlength="50">
    </div>
    <div class="form-group">
      <label for="serial">Serial</label>
      <input type="text" class="form-control" name="serial" maxlength="50">
    </div>
    <div class="form-group">
      <label for="ano">Ano</label>
      <input type="text" class="form-control" name="ano" maxlength="4">
    </div>
    <div class="form-group">
      <label for="empresa">Empresa</label>
      <select name="empresa" id="empresa" class="form-control">
        <option value="0" disabled selected>Selecione a Empresa</option>
        @foreach($empresas as $empresa)
          <option value="{{ $empresa->id }}">{{ $empresa->nome_fantasia }}</option>
        @endforeach
            
      </select>
    </div>
    <div class="form-group">
      <label for="onibus">Ônibus</label>
      <select name="onibus_id" id="onibus_id" class="form-control">
        <option value="0" disabled selected>Selecione o Ônibus</option>
      </select>
    </div>
        
        
    <button type="submit" class="btn btn-default">Enviar</button>
  </form>
  </div>

  <script type="text/javascript">
    $('#empresa').on('change', function(e){
      console.log(e);

      var empresa_id = e.target.value;

      $.get('/admin/equipamento/json-onibus?empresa_id=' + empresa_id, function(data)
      {
        console.log(data);
        
        $('#onibus_id').empty();
        $('#onibus_id').append('<option value="" disabled selected>Selecione o Ônibus</option>');

        $.each(data, function(index, onibusObj)
        {
          $('#onibus_id').append('<option value="'+ onibusObj.id +'">'+ onibusObj.numero +'</option>');
        });
      });
      
    });
  
  </script>

@endsection
