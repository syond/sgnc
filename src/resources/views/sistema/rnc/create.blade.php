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

    <div class="form-group">
      <div class="form-group">
        <label for="setor_id">Setor</label>
        <select name="setor_id" id="setor_id" class="form-control">
          <option value="0" disabled selected>Selecione o Setor</option>
        </select>
        </div>
      </div>
    <div class="form-group">
      
        <label for="setor_id">Período</label>
        <input type="date" class="form-control" name="de_data">
        até
        <input type="date" class="form-control" name="ate_data">
      
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


  
  </script>



@endsection
