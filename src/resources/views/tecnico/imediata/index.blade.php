@extends('layouts/layout')

@section('title', 'Ação Imediata')

@section('nav-map-name', 'Ação Imediata')

@section('content')

<h3 id="forms-example" class="">Ação Imediata</h3>
<hr>
<div class="row">
    <div class="col-sm-6">
        <form class="" action="{{ route('acao-imediata.create') }}">
            <button class="btn btn-success btn-lg">Cadastrar</button>
        </form>
    </div>
    <div class="col-sm-6">
        <form class="navbar-left-right" action="{{ route('acao-imediata.search') }}">
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
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Serial Equipamento</th>
            <th scope="col">Ônibus</th>
            <th scope="col">Data</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>        
    <tbody>

        @foreach($imediatas as $key => $value)
        <tr>
            <td>{{ $value->nome }}</td>
            <td>{{ $value->descricao }}</td>
            <td>{{ $value->serial }}</td>
            <td>{{ $value->onibus->placa }}</td>
            <td>{{ $value->data }}</td>


            <td>
                <form action="{{ route('acao-imediata.destroy', $value->id) }}" method="POST" onsubmit = "return confirm('Tem certeza que deseja excluir ?')">        
                    <a type="submit" href="{{ route('acao-imediata.edit', $value->id) }}" class="btn btn-warning">Editar</a>                       
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
    {{ $imediatas->links() }}
</div>


@endsection
