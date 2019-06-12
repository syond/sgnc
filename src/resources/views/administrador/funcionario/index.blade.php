@extends('layouts/layout')

@section('title', 'Funcionário')

@section('nav-map-name', 'Funcionário')

@section('content')




<h3 id="forms-example" class="">Funcionário</h3>
<hr>
<div class="row">
    <div class="col-sm-6">
        <form class="" action="{{ route('funcionario.create') }}">
            <button class="btn btn-success btn-lg">Cadastrar</button>
        </form>
    </div>
    <div class="col-sm-6">
        <form class="navbar-left-right" action="{{ route('funcionario.search') }}">
            <input type="text"  value="Buscar..." name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Buscar...';}">
            <input type="submit" value="" class="fa fa-search">
        </form>  
    </div>
</div>       
<hr>
<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <thead class="thead-dark">
        <div class="">
            <h4>Funcionários Cadastrados</h4>
        </div><br>
        <tr>
            <th scope="col">Matricula</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Nível de Acesso</th>
            <th scope="col">Empresa</th>
            <th scope="col">Setor</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>        
    <tbody>
        @foreach($funcionarios as $key => $value)
        <tr>
            <td>{{ $value->matricula }}</td>
            <td>{{ $value->nome }}</td>
            <td>{{ $value->email }}</td>
            @if($value->nivel == 1)
                <td>Supervisor</td>
            @endif
            @if($value->nivel == 0)
                <td>Técnico</td>
            @endif
            @if($value->empresa == null)
                <td></td>
            @else
                <td>{{ $value->empresa->nome_fantasia }}</td>
            @endif
            @if($value->setor == null)
                <td></td>
            @else
                <td>{{ $value->setor->nome }}</td>
            @endif 
            <td>
                <form style="margin:0px" action="{{ route('funcionario.destroy', $value->id) }}" style="margin:0px " method="POST" onsubmit = "return confirm('Tem certeza que seja excluir ?')">        
                    <a type="submit" href="{{ route('funcionario.edit', $value->id) }}" class="btn btn-warning">Editar</a>                       
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
                
</div>


@endsection
