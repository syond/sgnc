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
                <label for="empresa">Empresa</label>
                <select name="empresa" id="empresa" class="form-control">
                    <option value="0" disabled selected>{{ $imediata->equipamento->onibus->empresa->nome_fantasia }}</option>

                    @foreach($imediata->equipamento->onibus->empresa->get() as $empresa)
                    <option value="{{ $empresa->id }}">{{ $empresa->nome_fantasia }}</option>
                    @endforeach
                        
                </select>
            </div>
            <div class="form-group">
              <label for="setor_id">Setor</label>
              <select name="setor_id" id="setor_id" class="form-control">
                <option value="{{ $imediata->setor->id }}" disabled selected>{{ $imediata->setor->nome }}</option>
              </select>
            </div>
            <div class="form-group">
                <label for="onibus">Ônibus</label>
                <select name="onibus_id" id="onibus_id" class="form-control">
                    <option value="{{ $imediata->equipamento->onibus->id }}" disabled selected>{{ $imediata->equipamento->onibus->numero }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="equipamento_id">Equipamento</label>
                <select name="equipamento_id" id="equipamento_id" class="form-control">
                  <option value="{{ $imediata->equipamento->id }}" disabled selected>{{ $imediata->equipamento->serial }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nao_conformidade_id">Não Conformidade</label>
                <select name="nao_conformidade_id" id="nao_conformidade_id" class="form-control">
                  <option value="{{ $imediata->nao_conformidade->id }}" disabled selected>{{ $imediata->nao_conformidade->nome }}</option>
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


    $('#empresa').on('change', function(e){
      console.log(e);

      var empresa_id = e.target.value;

      $.get('/tecnico/acao-imediata/json-setor?empresa_id=' + empresa_id, function(data)
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
      console.log(e);

      var equipamento_id = e.target.value;

      $.get('/tecnico/acao-imediata/json-nao-conformidade?equipamento_id=' + equipamento_id, function(data)
      {
        console.log(data);
        
        $('#nao_conformidade_id').empty();
        $('#nao_conformidade_id').append('<option value="" disabled selected>Selecione a Não Conformidade</option>');

        $.each(data, function(index, naoConformidadeObj)
        {
          $('#nao_conformidade_id').append('<option value="'+ naoConformidadeObj.id +'">'+ naoConformidadeObj.nome +'</option>');
        });
      });
      
    });
  
</script>

@endsection
