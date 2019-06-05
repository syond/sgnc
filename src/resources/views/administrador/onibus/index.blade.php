@extends('layouts/layout')

@section('title', 'Ônibus')

@section('nav-map-name', 'Ônibus')

@section('content')

<h3 id="forms-example" class="">Ônibus</h3>
<hr>
<div class="row">
    <div class="col-sm-6">
        <form class="" action="{{ route('onibus.create') }}">
            <button class="btn btn-success btn-lg">Cadastrar</button>
        </form>
    </div>
    <div class="col-sm-6">
        <form class="navbar-left-right" action="{{ route('onibus.search') }}">
            <input type="text"  value="Buscar..." name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Buscar...';}">
            <input type="submit" value="" class="fa fa-search">
        </form>  
    </div>
</div>       
<hr>
<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <thead class="thead-dark">
        <div class="">
            <h4>Ônibus Cadastrados</h4>
        </div><br>
        <tr>
            <th scope="col">Modelo</th>
            <th scope="col">Placa</th>
            <th scope="col">Chassi</th>
            <th scope="col">Número</th>
            <th scope="col">Ano</th>
            <th scope="col">Empresa</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>        
    <tbody>

        @foreach($onibus as $key => $value)  

        <tr>
            <td>{{ $value->modelo }}</td>
            <td>{{ $value->placa }}</td>
            <td>{{ $value->chassi }}</td>
            <td>{{ $value->numero }}</td>
            <td>{{ $value->ano }}</td>
            <td>{{ $value->nome_fantasia }}</td>

            <td>
                <form action="{{ route('onibus.destroy', $value->id) }}" style="margin:0px " method="POST" onsubmit = "return confirm('Tem certeza que deseja excluir ?')">        
                    <a type="submit" href="{{ route('onibus.edit', $value->id) }}" class="btn btn-warning">Editar</a>                       
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
    {{ $onibus->links() }}
</div>


@endsection
