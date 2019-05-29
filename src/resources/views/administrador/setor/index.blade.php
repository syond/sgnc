@extends('layouts/layout')

@section('title', 'Setor')

@section('nav-map-name', 'Setor')

@section('content')


<h3 id="forms-example" class="">Setor</h3>
<hr>
<div class="row">
    <div class="col-sm-6">
        <form class="" action="{{ route('setor.create') }}">
            <button class="btn btn-success btn-lg">Cadastrar</button>
        </form>
    </div>
    <div class="col-sm-6">
        <form class="navbar-left-right" action="{{ route('setor.search') }}">
            <input type="text"  value="Buscar..." name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Buscar...';}">
            <input type="submit" value="" class="fa fa-search">
        </form>  
    </div>
</div>       
<hr>
<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <thead class="thead-dark">
        <div class="">
            <h4>Setores Cadastrados</h4>
        </div><br>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Empresa</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>        
    <tbody>

        @foreach($setores as $key => $value)         

        <tr>
            <td>{{ $value->nome }}</td>
            <td>{{ $value->nome_fantasia }}</td>
                    
                    

            <td>
                <form action="{{ route('setor.destroy', $value->id) }}" method="POST" onsubmit = "return confirm('Tem certeza que deseja excluir ?')">        
                    <a type="submit" href="{{ route('setor.edit', $value->id) }}" class="btn btn-warning">Editar</a>                       
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
    {{ $setores->links() }}            
</div>


@endsection
