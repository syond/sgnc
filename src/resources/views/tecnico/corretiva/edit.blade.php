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
                <label for="data">Data</label>
                <input type="date" class="form-control" name="data" id="data" value="{{ old('corretivas', $corretiva->data) }}">
            </div>            
            
            

            <div class="form-group">
                <label for="empresa">Empresa</label>
                <select name="empresa" id="empresa" class="form-control">
                    
                        
                </select>
            </div>
            <div class="form-group">
                <label for="onibus">Ônibus</label>
                <select name="onibus_id" id="onibus_id" class="form-control">
                    
                </select>
            </div>
            <div class="form-group">
                <label for="equipamento_id">Equipamento</label>
                <select name="equipamento_id" id="equipamento_id" class="form-control">
                    
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
  
</script>

@endsection
