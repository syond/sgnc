@extends('layouts/layout')

@section('title', 'Cadastrar RNC')

@section('nav-map-name', 'Cadastrar Relatório de Não Conformidade')
		    

@section('content')

  <h3 id="forms-example" class="">Cadastrar Relatório de Não Conformidade</h3>
  <hr>
  <form method="POST" action="{{ route('rnc.store') }}">

      @csrf

    <div class="form-group">
      <label for="empresa_id">Empresa</label>
      <select name="empresa_id" id="empresa_id" class="form-control">
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
      <label for="nao_conformidade_id">Ação de Não Conformidade</label>
      <select name="nao_conformidade_id" id="nao_conformidade_id" class="form-control">
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
        @foreach($tecnicos as $key => $value)
          <option value="{{ $value->id }}">{{ $value->nome }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="supervisor_id">Supervisor do Relatório</label>
      <select name="supervisor_id" id="supervisor_id" class="form-control">
        <option value="0" disabled selected>Selecione o Supervisor</option>
        @foreach($supervisores as $key => $value)
          <option value="{{ $value->id }}">{{ $value->nome }}</option>
        @endforeach
      </select>
    </div>
  </div>

    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea rows="5" style="resize: none" type="text" class="form-control" name="descricao" id="descricao" ></textarea>
    </div>
    
    <button type="submit" class="btn btn-default">Enviar</button>

  </form>
  </div>



  <script type="text/javascript">

    //SELECT DINAMICO SETOR
    $('#empresa_id').on('change', function(e){

      var empresa_id = e.target.value;

      $.get('/rnc/json-setor?empresa_id=' + empresa_id, function(data)
      {
        $('#setor_id').empty();
        $('#setor_id').append('<option value="" disabled selected>Selecione o Setor</option>');

        $.each(data, function(index, setorObj)
        {
          $('#setor_id').append('<option value="'+ setorObj.id +'">'+ setorObj.nome +'</option>');
        });
      });
      
    });
    //FIM SELECT DINAMICO SETOR


    //SELECT DINAMICO ONIBUS
    $('#empresa_id').on('change', function(e){

    var empresa_id = e.target.value;

    $.get('/rnc/json-onibus?empresa_id=' + empresa_id, function(data)
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
    $('#onibus_id').on('change', function(e){

    var onibus_id = e.target.value;

    $.get('/rnc/json-equipamento?onibus_id=' + onibus_id, function(data)
    {
      
      $('#equipamento_id').empty();
      $('#equipamento_id').append('<option value="" disabled selected>Selecione o Equipamento</option>');

      $.each(data, function(index, equipamentoObj)
      {
        $('#equipamento_id').append('<option value="'+ equipamentoObj.id +'">'+ equipamentoObj.serial +'</option>');
      });
    });

    });
    //FIM SELECT DINAMICO EQUIPAMENTO


    //SELECT DINAMICO NÃO CONFORMIDADE
    $('#equipamento_id').on('change', function(e){

    var equipamento_id = e.target.value;

    $.get('/rnc/json-nao-conformidade?equipamento_id=' + equipamento_id, function(data)
    {
      
      $('#nao_conformidade_id').empty();
      $('#nao_conformidade_id').append('<option value="" disabled selected>Selecione a Não Conformidade</option>');

      $.each(data, function(index, naoconformidadeObj)
      {
        $('#nao_conformidade_id').append('<option value="'+ naoconformidadeObj.id +'">'+ naoconformidadeObj.nome +'</option>');
      });
    });

    });
    //FIM SELECT DINAMICO NÃO CONFORMIDADE


    //SELECT DINAMICO IMEDIATA
    $('#equipamento_id').on('change', function(e){

    var equipamento_id = e.target.value;

    $.get('/rnc/json-imediata?equipamento_id=' + equipamento_id, function(data)
    {
      
      $('#imediata_id').empty();
      $('#imediata_id').append('<option value="" disabled selected>Selecione a Ação Imediata</option>');

      $.each(data, function(index, imediataObj)
      {
        $('#imediata_id').append('<option value="'+ imediataObj.id +'">'+ imediataObj.nome +'</option>');
      });
    });

    });
    //FIM SELECT DINAMICO IMEDIATA


    //SELECT DINAMICO CORRETIVA
    $('#equipamento_id').on('change', function(e){

    var equipamento_id = e.target.value;

    $.get('/rnc/json-corretiva?equipamento_id=' + equipamento_id, function(data)
    {
      
      $('#corretiva_id').empty();
      $('#corretiva_id').append('<option value="" disabled selected>Selecione a Ação Corretiva</option>');

      $.each(data, function(index, corretivaObj)
      {
        $('#corretiva_id').append('<option value="'+ corretivaObj.id +'">'+ corretivaObj.nome +'</option>');
      });
    });

    });
    //FIM SELECT DINAMICO CORRETIVA

  
  </script>



@endsection
