@extends('layouts/layout')

@section('title', 'Empresa')

@section('nav-map-name', 'Empresa')
		    


@section('content')


<div class="grid-form">
    <div class="grid-form1">
        <h3 id="forms-example" class="">Empresa</h3>

        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">CNPJ</th>
                <th scope="col">Nome Fantasia</th>
                <th scope="col">Razão Social</th>
            </tr>
        </thead>
        
        <tbody>

        @foreach($empresa as $key => $value)

            <tr>
                <th scope="row">{{ $value->cnpj }}</th>
                <td>{{ $value->nome_fantasia }}</td>
                <td>{{ $value->razao_social }}</td>

                <td>

                    <form action="{{ route('empresa.edit', $value->id) }}" method="PUT">

                        <button type="submit" class="btn btn-primary">Editar</button>

                    </form>


                    <form action="{{ route('empresa.destroy', $value->id) }}" method="POST">
                        
                        <input name="_method" type="hidden" value="DELETE">
                        
                        {{ csrf_field() }}
                            
                        <button type="submit" class="btn btn-danger">Excluir</button>

                    </form>


                </td>
            </tr>
            
        @endforeach

        </tbody>
    </table>

    <br>

    <a class="btn btn-success" href="{{ route('empresa.create') }}">Cadastrar</a><br>

    </div>
</div>


   

  
@endsection

