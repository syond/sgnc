@extends('layouts/layout')

@section('title', 'Cadastro de Empresa')

@section('nav-map-name', 'Cadastro de Empresa')
		    

@section('content')

    <h3 id="forms-example" class="">Cadastro de Empresa</h3>
 
    <hr>

    <form method="POST" action="{{ route('empresa.store') }}">

      @csrf


      <div class="form-group">
        <label for="cnpj">CNPJ</label>
        <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="00.000.000/0000-00">
      </div>
      <div class="form-group">
        <label for="razaoSocial">Razão Social</label>
        <input type="text" class="form-control" name="razao_social" placeholder="Empresa de Ônibus.S/A" maxlength="100">
      </div>
      <div class="form-group">
        <label for="nomeFantasia">Nome Fantasia</label>
        <input type="text" class="form-control" name="nome_fantasia" placeholder="Empresa de Ônibus" maxlength="100">
      </div>
      
      <button type="submit" class="btn btn-default">Enviar</button>
      </form>
    </div>


<script type="text/javascript">

  $(document).ready(function(){
    $("#cnpj").mask("00.000.000/0000-00")
  })

</script>

@endsection
