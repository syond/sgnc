@extends('layouts/layout')

@section('title', 'Empresa')

@section('nav-map-name', 'Empresa')
		    


@section('content')


        <h3 id="forms-example" class="">Empresa</h3>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <form class="" action="{{ route('empresa.create') }}">
                    <button class="btn btn-success btn-lg">Cadastrar</button>
                </form>
            </div>

        </div>        
        <hr>
        <table id="empresa_table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead class="thead-dark">
                <div class="">
                    <h4>Empresas Cadastradas</h4>
                </div><br>
                <tr>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Nome Fantasia</th>
                    <th scope="col">Razão Social</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>        
            <tbody>
                @foreach($empresa as $key => $value)
                
                <tr>
                    <td id="cnpj">{{ $value->cnpj }}</td>
                    <td>{{ $value->nome_fantasia }}</td>
                    <td>{{ $value->razao_social }}</td>
                    
                    

                    <td>
                        <form action="{{ route('empresa.destroy', $value->id) }}" style="margin:0px " method="POST" onsubmit = "return confirm('AVISO!!!! Ao excluir uma empresa também serão excluídos SETORES e ÔNIBUS relacionados a ela. Tem certeza que seja excluir ?')">        
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

<script type="text/javascript">

  $(document).ready(function(){
        $("#cnpj").mask("00.000.000/0000-00")
  })



    $(document).ready( function () {
        $('#empresa_table').DataTable({
            "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                }
        });
    } );




</script>
@endsection
