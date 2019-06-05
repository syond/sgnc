@extends('layouts/layout')

@section('title', 'RNC')

@section('nav-map-name', 'Relatório de Não Conformidade')
		    

@section('content')

  <h3 id="forms-example" class="">Relatório de Não Conformidade</h3>
  <hr>
  <form method="POST" action="{{ route('acao-corretiva.store') }}">

      @csrf

    <div class="form-group">
      <label for="empresa">Empresa</label>
      <select name="empresa" id="empresa" class="form-control">
        <option value="0" disabled selected>Selecione a Empresa</option>
        @foreach($empresas as $empresa)
          <option value="{{ $empresa->id }}">{{ $empresa->nome_fantasia }}</option>
        @endforeach
            
      </select>
    </div>

  <div class="col-sm-6">
    <div class="form-group">
      <label for="setor_id">Setor</label>
      <select name="setor_id" id="setor_id" class="form-control">
        <option value="0" disabled selected>Selecione o Setor</option>
      </select>
    </div>
    <div class="form-group">
      <label for="onibus_id">Ônibus</label>
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
    <div class="form-group">
      <label for="naoconformidade_id">Ação de Não Conformidade</label>
      <select name="naoconformidade_id" id="naoconformidade_id" class="form-control">
        <option value="0" disabled selected>Selecione a Não Conformidade</option>
      </select>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="form-group">
      <label for="imediata_id">Ação Imediata</label>
      <select name="imediata_id" id="imediata_id" class="form-control">
        <option value="0" disabled selected>Selecione a Imediata</option>
      </select>
    </div>
    <div class="form-group">
      <label for="corretiva_id">Ação Corretiva</label>
      <select name="corretiva_id" id="corretiva_id" class="form-control">
        <option value="0" disabled selected>Selecione a Corretiva</option>
      </select>
    </div>
    <div class="form-group">
      <label for="tecnico_id">Técnico do Relatório</label>
      <select name="tecnico_id" id="tecnico_id" class="form-control">
        <option value="0" disabled selected>Selecione o Técnico</option>
      </select>
    </div>
    <div class="form-group">
      <label for="supervisor_id">Supervisor do Relatório</label>
      <select name="supervisor_id" id="supervisor_id" class="form-control">
        <option value="0" disabled selected>Selecione o Supervisor</option>
      </select>
    </div>
  </div>
    <button type="submit" class="btn btn-default">Enviar</button>
  </form>
  </div>



  <script type="text/javascript">

    //SELECT DINAMICO SETOR
    $('#empresa').on('change', function(e){

      var empresa_id = e.target.value;

      $.get('/tecnico/acao-corretiva/json-onibus?empresa_id=' + empresa_id, function(data)
      {
        
        $('#onibus_id').empty();
        $('#onibus_id').append('<option value="" disabled selected>Selecione o Ônibus</option>');

        $.each(data, function(index, onibusObj)
        {
          $('#onibus_id').append('<option value="'+ onibusObj.id +'">'+ onibusObj.numero +'</option>');
        });
      });
      
    });
    //FIM SELECT DINAMICO SETOR


    //SELECT DINAMICO ONIBUS
    $('#empresa').on('change', function(e){

    var empresa_id = e.target.value;

    $.get('/tecnico/acao-corretiva/json-onibus?empresa_id=' + empresa_id, function(data)
    {
      
      $('#onibus_id').empty();
      $('#onibus_id').append('<option value="" disabled selected>Selecione o Ônibus</option>');

      $.each(data, function(index, onibusObj)
      {
        $('#onibus_id').append('<option value="'+ onibusObj.id +'">'+ onibusObj.numero +'</option>');
      });
    });

    });
    //FIM SELECT DINAMICO ONIBUS


    //SELECT DINAMICO EQUIPAMENTO
    $('#empresa').on('change', function(e){

    var empresa_id = e.target.value;

    $.get('/tecnico/acao-corretiva/json-onibus?empresa_id=' + empresa_id, function(data)
    {
      
      $('#onibus_id').empty();
      $('#onibus_id').append('<option value="" disabled selected>Selecione o Ônibus</option>');

      $.each(data, function(index, onibusObj)
      {
        $('#onibus_id').append('<option value="'+ onibusObj.id +'">'+ onibusObj.numero +'</option>');
      });
    });

    });
    //FIM SELECT DINAMICO EQUIPAMENTO


    //SELECT DINAMICO NÃO CONFORMIDADE
    $('#empresa').on('change', function(e){

    var empresa_id = e.target.value;

    $.get('/tecnico/acao-corretiva/json-onibus?empresa_id=' + empresa_id, function(data)
    {
      
      $('#onibus_id').empty();
      $('#onibus_id').append('<option value="" disabled selected>Selecione o Ônibus</option>');

      $.each(data, function(index, onibusObj)
      {
        $('#onibus_id').append('<option value="'+ onibusObj.id +'">'+ onibusObj.numero +'</option>');
      });
    });

    });
    //FIM SELECT DINAMICO NÃO CONFORMIDADE


    //SELECT DINAMICO IMEDIATA
    $('#empresa').on('change', function(e){

    var empresa_id = e.target.value;

    $.get('/tecnico/acao-corretiva/json-onibus?empresa_id=' + empresa_id, function(data)
    {
      
      $('#onibus_id').empty();
      $('#onibus_id').append('<option value="" disabled selected>Selecione o Ônibus</option>');

      $.each(data, function(index, onibusObj)
      {
        $('#onibus_id').append('<option value="'+ onibusObj.id +'">'+ onibusObj.numero +'</option>');
      });
    });

    });
    //FIM SELECT DINAMICO IMEDIATA


    //SELECT DINAMICO CORRETIVA
    $('#empresa').on('change', function(e){

    var empresa_id = e.target.value;

    $.get('/tecnico/acao-corretiva/json-onibus?empresa_id=' + empresa_id, function(data)
    {
      
      $('#onibus_id').empty();
      $('#onibus_id').append('<option value="" disabled selected>Selecione o Ônibus</option>');

      $.each(data, function(index, onibusObj)
      {
        $('#onibus_id').append('<option value="'+ onibusObj.id +'">'+ onibusObj.numero +'</option>');
      });
    });

    });
    //FIM SELECT DINAMICO CORRETIVA


    //SELECT DINAMICO TÉCNICO
    $('#empresa').on('change', function(e){

    var empresa_id = e.target.value;

    $.get('/tecnico/acao-corretiva/json-onibus?empresa_id=' + empresa_id, function(data)
    {
      
      $('#onibus_id').empty();
      $('#onibus_id').append('<option value="" disabled selected>Selecione o Ônibus</option>');

      $.each(data, function(index, onibusObj)
      {
        $('#onibus_id').append('<option value="'+ onibusObj.id +'">'+ onibusObj.numero +'</option>');
      });
    });

    });
    //FIM SELECT DINAMICO TÉCNICO



    //SELECT DINAMICO SUPERVISOR
    $('#empresa').on('change', function(e){

    var empresa_id = e.target.value;

    $.get('/tecnico/acao-corretiva/json-onibus?empresa_id=' + empresa_id, function(data)
    {
      
      $('#onibus_id').empty();
      $('#onibus_id').append('<option value="" disabled selected>Selecione o Ônibus</option>');

      $.each(data, function(index, onibusObj)
      {
        $('#onibus_id').append('<option value="'+ onibusObj.id +'">'+ onibusObj.numero +'</option>');
      });
    });

    });
    //FIM SELECT DINAMICO SUPERVISOR
  
  </script>



@endsection
