@extends('layouts/layout')

@section('title', 'Equipamento')

@section('nav-map-name', 'Equipamento')

@section('content')


<h3 id="forms-example" class="">Equipamento</h3>
<hr>
<div class="row">
    <div class="col-sm-6">
        <form class="" action="{{ route('equipamento.create') }}">
            <button class="btn btn-success btn-lg">Cadastrar</button>
        </form>
    </div>
    <div class="col-sm-6">
        <form class="navbar-left-right" action="{{ route('equipamento.search') }}">
            <input type="text"  value="Buscar..." name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Buscar...';}">
            <input type="submit" value="" class="fa fa-search">
        </form>  
    </div>
</div>       
<hr>
<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <thead class="thead-dark">
        <div class="">
            <h4>Equipamentos Cadastrados</h4>
        </div><br>
        <tr>
            <th scope="col">Fabrica</th>
            <th scope="col">Modelo</th>
            <th scope="col">Serial</th>
            <th scope="col">Ano</th>
            <th scope="col">Ônibus:</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>        
    <tbody>
        @foreach($equipamento as $key => $value)     
            <tr>
                <td>{{ $value->fabrica }}</td>
                <td>{{ $value->modelo }}</td>
                <td>{{ $value->serial }}</td>
                <td>{{ $value->ano }}</td>
                <td>{{ $value->placa }}</td>
                        
                        

                <td>
                    <form action="{{ route('equipamento.destroy', $value->id) }}" style="margin:0px " method="POST" onsubmit = "return confirm('Tem certeza que seja excluir ?')">        
                        <a type="submit" href="{{ route('equipamento.edit', $value->id) }}" class="btn btn-warning">Editar</a>                       
                        @csrf
                        @method('DELETE')     
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>        
                </td>
            </tr>         
        @endforeach  
    </tbody>
</table>
<div class="text-center">
    {{ $equipamento->links() }}
</div>


@endsection
