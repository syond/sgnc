@extends('layouts/layout')

@section('title', 'Editar Empresa')

@section('nav-map-name', 'Editar Empresa')
		    
@section('content')

 	<div class="grid-form">
    <div class="grid-form1">
    <h3 id="forms-example" class="">Editar Empresa</h3>


    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif

        <form method="POST" action="{{ route('empresa.update', $empresa->id) }}">

            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control" name="cnpj" placeholder="00.000.000/0000-00">
            </div>
            <div class="form-group">
                <label for="razaoSocial">Razão Social</label>
                <input type="text" class="form-control" name="razao_social" placeholder="Empresa de Ônibus.S/A">
            </div>
            <div class="form-group">
                <label for="nomeFantasia">Nome Fantasia</label>
                <input type="text" class="form-control" name="nome_fantasia" placeholder="Empresa de Ônibus">
            </div>
            
                <input type="submit" class="btn btn-default" value="Alterar">
            </div>
        </form>
</body>
</html>

@endsection
