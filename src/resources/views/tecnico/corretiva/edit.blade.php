@extends('layouts/layout')

@section('title', 'Editar Ação Corretiva')

@section('nav-map-name', 'Editar Ação Corretiva')
		    
@section('content')


    <h3 id="forms-example" class="">Editar Ação Corretiva</h3>

        <form method="POST" action="{{ route('acao-corretiva.update', $corretiva->id) }}">

            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ old('corretivas', $corretiva->nome) }}">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea rows="5" style="resize: none" class="form-control" name="descricao" id="descricao" >{{ old('corretivas', $corretiva->descricao) }}</textarea>
            </div>           
            

            <div class="form-group">
                <label for="empresa">Empresa</label>
                <select name="empresa" id="empresa" class="form-control">
                    <option value="0" disabled selected>{{ $corretiva->equipamento->onibus->empresa->nome_fantasia }}</option>
                    @foreach($corretiva->equipamento->onibus->empresa->get() as $empresa)
                    <option value="{{ $empresa->id }}">{{ $empresa->nome_fantasia }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
              <label for="setor_id">Setor</label>
              <select name="setor_id" id="setor_id" class="form-control">
                <option value="{{ $corretiva->setor->id }}" disabled selected>{{ $corretiva->setor->nome }}</option>
              </select>
            </div>
            <div class="form-group">
                <label for="onibus">Ônibus</label>
                <select name="onibus_id" id="onibus_id" class="form-control">
                    <option value="{{ $corretiva->equipamento->onibus->id }}" disabled selected>{{ $corretiva->equipamento->onibus->numero }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="equipamento_id">Equipamento</label>
                <select name="equipamento_id" id="equipamento_id" class="form-control">
                    <option value="{{ $corretiva->equipamento->id }}" disabled selected>{{ $corretiva->equipamento->serial }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="imediata_id">Ação Imediata</label>
                <select name="imediata_id" id="imediata_id" class="form-control">
                  <option value="{{ $corretiva->imediata->id }}" disabled selected>{{ $corretiva->imediata->nome }}</option>
                </select>
            </div>
                <input type="submit" class="btn btn-default" value="Alterar">
            </div>
  
        </form>

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


    $('#empresa').on('change', function(e){
      console.log(e);

      var empresa_id = e.target.value;

      $.get('/tecnico/acao-corretiva/json-setor?empresa_id=' + empresa_id, function(data)
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
  
</script>

@endsection
