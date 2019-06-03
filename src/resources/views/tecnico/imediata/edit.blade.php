@extends('layouts/layout')

@section('title', 'Editar Ação Imediata')

@section('nav-map-name', 'Editar Ação Imediata')
		    
@section('content')


    <h3 id="forms-example" class="">Editar Ação Imediata</h3>

        <form method="POST" action="{{ route('acao-imediata.update', $imediata->id) }}">

            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ old('imediatas', $imediata->nome) }}">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea rows="5" style="resize: none" class="form-control" name="descricao" id="descricao" >{{ old('imediatas', $imediata->descricao) }}</textarea>
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="date" class="form-control" name="data" id="data" value="{{ old('imediatas', $imediata->data) }}">
            </div>            
            
            

            <div class="form-group">
                <label for="empresa">Empresa</label>
                <select name="empresa" id="empresa" class="form-control">
                    <option value="0" disabled selected>{{ $imediata->equipamento->onibus->empresa->nome_fantasia }}</option>

                    @foreach($imediata->equipamento->onibus->empresa->get() as $empresa)
                    <option value="{{ $empresa->id }}">{{ $empresa->nome_fantasia }}</option>
                    @endforeach
                        
                </select>
            </div>
            <div class="form-group">
                <label for="onibus">Ônibus</label>
                <select name="onibus_id" id="onibus_id" class="form-control">
                    <option value="{{ $imediata->equipamento->onibus->id }}" disabled selected>{{ $imediata->equipamento->onibus->placa }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="equipamento_id">Equipamento</label>
                <select name="equipamento_id" id="equipamento_id" class="form-control">
                <option value="{{ $imediata->equipamento->id }}" disabled selected>{{ $imediata->equipamento->serial }}</option>
                </select>
            </div>
                <input type="submit" class="btn btn-default" value="Alterar">
            </div>
  
        </form>

<script type="text/javascript">

    $('#empresa').on('change', function(e){
      console.log(e);

      var empresa_id = e.target.value;

      $.get('/tecnico/acao-imediata/json-onibus?empresa_id=' + empresa_id, function(data)
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



    $('#onibus_id').on('change', function(e){
      console.log(e);

      var onibus_id = e.target.value;

      $.get('/tecnico/acao-imediata/json-equipamento?onibus_id=' + onibus_id, function(data)
      {
        console.log(data);
        
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
