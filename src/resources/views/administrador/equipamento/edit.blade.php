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
                <input type="text" class="form-control" name="fabrica" id="fabrica" value="{{ $equipamento->fabrica }}">
            </div>
            <div class="form-group">
                <label for="razaoSocial">Modelo</label>
                <input type="text" class="form-control" name="modelo" placeholder="Modelo" value="{{ $equipamento->modelo }}">
            </div>
            <div class="form-group">
                <label for="nomeFantasia">Serial</label>
                <input type="text" class="form-control" name="serial" placeholder="Serial" value="{{ $equipamento->serial }}">
            </div>
            <div class="form-group">
                <label for="nomeFantasia">Ano</label>
                <input type="text" class="form-control" name="ano" placeholder="Ano" value="{{ $equipamento->ano }}">
            </div>
            
                <input type="submit" class="btn btn-default" value="Alterar">
            </div>
        </form>

@endsection
