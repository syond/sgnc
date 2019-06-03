@extends('layouts/layout')

@section('title', 'Cadastro de Não Conformidade')

@section('nav-map-name', 'Cadastro de Não Conformidade')
		    

@section('content')

  <h3 id="forms-example" class="">Cadastro de Não Conformidade</h3>
  <hr>
  <form method="POST" action="{{ route('nao-conformidade.store') }}">

      @csrf

    <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome" id="nome" >
    </div>
    <div class="form-group">
      <label for="descricao">Descrição</label>
      <textarea rows="5" style="resize: none" type="text" class="form-control" name="descricao" id="descricao" ></textarea>
    </div>
    <div class="form-group">
      <label for="data">Data</label>
      <input type="date" class="form-control" name="data" id="data" >
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
    <div class="form-group">
      <label for="equipamento_id">Equipamento</label>
      <select name="equipamento_id" id="equipamento_id" class="form-control">
        <option value="0" disabled selected>Selecione o Equipamento</option>
      </select>
    </div>
        
    <button type="submit" class="btn btn-default">Enviar</button>
  </form>
  </div>



  <script type="text/javascript">

    $('#empresa').on('change', function(e){

      var empresa_id = e.target.value;

      $.get('/tecnico/nao-conformidade/json-onibus?empresa_id=' + empresa_id, function(data)
      {
        
        $('#onibus_id').empty();
        $('#onibus_id').append('<option value="" disabled selected>Selecione o Ônibus</option>');

        $.each(data, function(index, onibusObj)
        {
          $('#onibus_id').append('<option value="'+ onibusObj.id +'">'+ onibusObj.numero +'</option>');
        });
      });
      
    });



    $('#onibus_id').on('change', function(e){

      var onibus_id = e.target.value;

      $.get('/tecnico/nao-conformidade/json-equipamento?onibus_id=' + onibus_id, function(data)
      {
        
        $('#equipamento_id').empty();
        $('#equipamento_id').append('<option value="" disabled selected>Selecione o Equipamento</option>');

        $.each(data, function(index, equipamentoObj)
        {
          $('#equipamento_id').append('<option value="'+ equipamentoObj.id +'">'+ equipamentoObj.serial +'</option>');
        });
      });
      
    });
  
  </script>



@endsection
