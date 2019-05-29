@extends('layouts/layout')

@section('title', 'Editar Equipamento')

@section('nav-map-name', 'Editar Equipamento')
		    
@section('content')


    <h3 id="forms-example" class="">Editar Equipamento</h3>

        <form method="POST" action="{{ route('equipamento.update', $equipamento->id) }}">

            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="cnpj">Fábrica</label>
                <input type="text" class="form-control" name="fabrica" id="fabrica" value="{{ old('equipamentos', $equipamento->fabrica) }}">
            </div>
            <div class="form-group">
                <label for="razaoSocial">Modelo</label>
                <input type="text" class="form-control" name="modelo" placeholder="Modelo" value="{{ old('equipamentos', $equipamento->modelo) }}">
            </div>
            <div class="form-group">
                <label for="nomeFantasia">Serial</label>
                <input type="text" class="form-control" name="serial" placeholder="Serial" value="{{ old('equipamentos', $equipamento->serial) }}">
            </div>
            <div class="form-group">
                <label for="nomeFantasia">Ano</label>
                <input type="text" class="form-control" name="ano" placeholder="Ano" value="{{ old('equipamentos', $equipamento->ano) }}">
            </div>
            

            <div class="form-group">
                <label for="empresa">Empresa</label>
                <select name="empresa" id="empresa" class="form-control">
                    <option value="0" disabled selected>{{ $equipamento->onibus->empresa->nome_fantasia }}</option>

                    @foreach($equipamento->onibus->empresa->get() as $empresa)
                    <option value="{{ $empresa->id }}">{{ $empresa->nome_fantasia }}</option>
                    @endforeach
                        
                </select>
            </div>
            <div class="form-group">
                <label for="onibus">Ônibus</label>
                <select name="onibus_id" id="onibus_id" class="form-control">
                    <option value="{{ $equipamento->onibus->id }}" disabled selected>{{ $equipamento->onibus->placa }}</option>
                </select>
            </div>

            



                <input type="submit" class="btn btn-default" value="Alterar">
            </div>
  
        </form>

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
          $('#onibus_id').append('<option value="'+ onibusObj.id +'">'+ onibusObj.placa +'</option>');
        });
      });
      
    });
  
</script>

@endsection
