@extends('layouts/layout')

@section('title', 'Editar Empresa')

@section('nav-map-name', 'Editar Empresa')
		    
@section('content')

    <h3 id="forms-example" class="">Editar Empresa</h3>

        <form method="POST" action="{{ route('empresa.update', $empresa->id) }}">

            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="00.000.000/0000-00" value="{{ $empresa->cnpj }}">
            </div>
            <div class="form-group">
                <label for="razaoSocial">Razão Social</label>
                <input type="text" class="form-control" name="razao_social" placeholder="Empresa de Ônibus.S/A" value="{{ $empresa->razao_social }}">
            </div>
            <div class="form-group">
                <label for="nomeFantasia">Nome Fantasia</label>
                <input type="text" class="form-control" name="nome_fantasia" placeholder="Empresa de Ônibus" value="{{ $empresa->nome_fantasia }}">
            </div>
            
                <input type="submit" class="btn btn-default" value="Alterar">
            </div>
        </form>

<script type="text/javascript">

    $(document).ready(function(){
        $("#cnpj").mask("00.000.000/0000-00")
    })

</script>
@endsection
