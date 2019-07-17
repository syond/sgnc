@extends('layouts/layout')

@section('title', 'Cadastro de Ação Corretiva')

@section('nav-map-name', 'Cadastro de Ação Corretiva')
		    

@section('content')

  <h3 id="forms-example" class="">Cadastro de Ação Corretiva</h3>
  <hr>
  <form method="POST" action="{{ route('acao-corretiva.store') }}">

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
      <label for="empresa">Empresa</label>
      <select name="empresa" id="empresa" class="form-control">
        <option value="0" disabled selected>Selecione a Empresa</option>
        @foreach($empresas as $empresa)
          <option value="{{ $empresa->id }}">{{ $empresa->nome_fantasia }}</option>
        @endforeach
            
      </select>
    </div>
    <div class="form-group">
      <label for="setor_id">Setor</label>
      <select name="setor_id" id="setor_id" class="form-control">
        <option value="0" disabled selected>Selecione o Setor</option>
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
    <div class="form-group">
      <label for="imediata_id">Ação Imediata</label>
      <select name="imediata_id" id="imediata_id" class="form-control">
        <option value="0" disabled selected>Selecione a Ação Imediata</option>
      </select>
    </div>
        
    <button type="submit" class="btn btn-default">Enviar</button>
  </form>
  </div>



  <script type="text/javascript">

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



    $('#onibus_id').on('change', function(e){

      var onibus_id = e.target.value;

      $.get('/tecnico/acao-corretiva/json-equipamento?onibus_id=' + onibus_id, function(data)
      {
        
        $('#equipamento_id').empty();
        $('#equipamento_id').append('<option value="" disabled selected>Selecione o Equipamento</option>');

        $.each(data, function(index, equipamentoObj)
        {
          $('#equipamento_id').append('<option value="'+ equipamentoObj.id +'">'+ equipamentoObj.serial +'</option>');
        });
      });
      
    });


    $('#equipamento_id').on('change', function(e){

      var equipamento_id = e.target.value;

      $.get('/tecnico/acao-corretiva/json-imediata?equipamento_id=' + equipamento_id, function(data)
      {
        
        $('#imediata_id').empty();
        $('#imediata_id').append('<option value="" disabled selected>Selecione a Ação Imediata</option>');

        $.each(data, function(index, imediataObj)
        {
          $('#imediata_id').append('<option value="'+ imediataObj.id +'">'+ imediataObj.nome +'</option>');
        });
      });
      
    });


    $('#empresa').on('change', function(e){
      console.log(e);

      var empresa_id = e.target.value;

      $.get('/tecnico/nao-conformidade/json-setor?empresa_id=' + empresa_id, function(data)
      {
        console.log(data);
        
        $('#setor_id').empty();
        $('#setor_id').append('<option value="" disabled selected>Selecione o Setor</option>');

        $.each(data, function(index, setorObj)
        {
          $('#setor_id').append('<option value="'+ setorObj.id +'">'+ setorObj.nome +'</option>');
        });
      });
      
    });
  
  </script>



@endsection
