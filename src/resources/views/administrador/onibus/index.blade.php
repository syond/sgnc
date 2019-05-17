@extends('layouts/layout')

@section('title', 'Ônibus')

@section('nav-map-name', 'Ônibus')

@section('content')


<h3 id="forms-example" class="">Ônibus</h3>
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
            <h4>Ônibus Cadastrados</h4>
        </div><br>
        <tr>
            <th scope="col">Fabrica</th>
            <th scope="col">Modelo</th>
            <th scope="col">Serial</th>
            <th scope="col">Ano</th>
            <th scope="col">Data de Criação:</th>
            <th scope="col">Última Atualização:</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>        
    <tbody>
                
        <tr>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
                    
                    

            <td>
                        
            </td>
        </tr>         
                
    </tbody>
</table>
<div class="text-center">
            
</div>


@endsection
