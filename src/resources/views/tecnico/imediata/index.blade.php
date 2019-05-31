@extends('layouts/layout')

@section('title', 'Ação Imediata')

@section('nav-map-name', 'Ação Imediata')

@section('content')

<h3 id="forms-example" class="">Ação Imediata</h3>
<hr>
<div class="row">

    <div class="col-sm-4">
		<label for="equipamento_id">Técnico Responsável</label>
		<select name="equipamento_id" id="equipamento_id" class="form-control">
			<option value="" disabled selected></option>
            @foreach($funcionarios as $value)
        	<option value="{{ $value->id }}">{{ $value->nome }}</option>
            @endforeach
        </select>
    </div>


    <div class="col-sm-4">
		<label for="status">Status</label>
		<select name="status" id="status" class="form-control">
			<option value="" disabled selected></option>
        	<option value="">Pendente</option>
			<option value="">Em andamento</option>
			<option value="">Encerrado</option>
        </select>
    </div>

    <div class="col-sm-4">
        <label for="equipamento_id">Data</label>
        <input type="date" name="equipamento_id" id="equipamento_id" class="form-control">
    </div>

    <div class="col-sm-4">
        <form class="" action="{{ route('acao-imediata.create') }}">
            <button class="btn btn-success btn-lg">Cadastrar</button>
        </form>
    </div>
    <div class="col-sm-4">
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
            <h4>Ações Cadastradas</h4>
        </div><br>
        <tr>
            <th scope="col">CÓDIGO</th>
            <th scope="col">Nome</th>
            <th scope="col">Serial Equipamento</th>
            <th scope="col">Ônibus</th>
            <th scope="col">Responsável</th>
            <th scope="col">Data</th>
            <th scope="col">Status</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>        
    <tbody>

        @foreach($imediatas as $key => $value)

        <tr>
            <td><a type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">{{ $value->id }}</a></td>
            <td>{{ $value->nome }}</td>
            <td>{{ $value->serial }}</td>
            <td>{{ $value->onibus->numero }}</td>
            <td>{{ $value->funcionario_id }}</td>
            <td>{{ $value->data }}</td>
            
            @if($value->status == 0)
                <td><span class="badge badge-warning">Pendente</span></td>
            @endif
            @if($value->status == 1)
                <td><span class="badge badge-primary">Em andamento</span></td>
            @endif
            @if($value->status == 2)
                <td><span class="badge badge-success">Encerrado</span></td>
            @endif


            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalhes da Ação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-group">
                        <h4>{{ $value->nome }}</h4>
                    </div>
                    <div class="form-group">
                        <label for="data_criacao" class="col-form-label">Data de criação:</label>
                        <span>{{ $value->created_at }}</span>
                    </div>
                    <div class="form-group">
                        <label for="data_execucao" class="col-form-label">Data de execução:</label>
                        <span>{{ $value->data }}</span>
                    </div>
                    <div class="form-group">
                        <label for="descricao" class="col-form-label">Descrição:</label>
                        <span>{{ $value->descricao }}</span>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
                </div>
            </div>
        </div>
        

            <td>
                <form action="{{ route('acao-imediata.destroy', $value->id) }}" style="margin:0px " method="POST" onsubmit = "return confirm('Tem certeza que deseja excluir ?')">        
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
