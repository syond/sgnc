@extends('layouts/layout')

@section('title', 'Empresa')

@section('nav-map-name', 'Empresa')
		    


@section('content')


<div class="grid-form">
    <div class="grid-form1">
        <h3 id="forms-example" class="">Empresa</h3>
        <hr>
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        @component('layouts/header-index-controller')
        @endcomponent
        <hr>
        <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead class="thead-dark">
                <div class="">
                    <h4>Empresas Cadastradas</h4>
                </div><br>
                <tr>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Nome Fantasia</th>
                    <th scope="col">Razão Social</th>
                    <th scope="col">Criação:</th>
                    <th scope="col">Última Atualização:</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>        
            <tbody>
                @foreach($empresa as $key => $value)
                <tr>
                    <td>{{ $value->cnpj }}</td>
                    <td>{{ $value->nome_fantasia }}</td>
                    <td>{{ $value->razao_social }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>{{ $value->updated_at }}</td>
                    <td>
                        <form action="{{ route('empresa.destroy', $value->id) }}" method="POST">        
                            <a type="submit" href="{{ route('empresa.edit', $value->id) }}" class="btn btn-warning">Editar</a>                       
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
            {{ $empresa->links() }}
        </div>
    </div>
</div>

  
@endsection
