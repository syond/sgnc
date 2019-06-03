@extends('layouts/layout')

@section('title', 'Não Conformidade')

@section('nav-map-name', 'Não Conformidade')

@section('content')


<style style="text/css">
  	#dados:hover {
          background-color: #f2f2f2;
          cursor: pointer;
        }
</style>


<h3 id="forms-example" class="">Não Conformidade</h3>
<hr>
<div class="row">

    <div class="col-sm-4">
		<label for="tecnico_responsavel">Técnico Responsável</label>
		<select name="tecnico_responsavel" id="tecnico_responsavel" class="form-control">
			<option value="" disabled selected></option>
            @foreach($funcionarios as $value)
        	<option value="{{ $value->id }}">{{ $value->nome }}</option>
            @endforeach
        </select>
    </div>


    <div class="col-sm-4">
		<label for="onibus">Ônibus</label>
		<select name="onibus" id="onibus" class="form-control">
			<option value="" disabled selected></option>
            @foreach($nao_conformidades as $key => $value)
        	<option value="{{ $value->equipamento->onibus->id }}">{{ $value->equipamento->onibus->numero }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-sm-4">
        <label for="data">Data</label>
        <input type="date" name="data" id="data" class="form-control">
    </div>

    <div class="col-sm-4">
        <form class="" action="{{ route('nao-conformidade.create') }}">
            <button class="btn btn-success btn-lg">Cadastrar</button>
        </form>
    </div>
    <div class="col-sm-4">
        <form class="navbar-left-right" action="{{ route('nao-conformidade.search') }}">
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
            <th scope="col">Ação</th>
        </tr>
    </thead>        
    <tbody>

        @foreach($nao_conformidades as $key => $value)

        <tr>
            <td>{{ $value->c_id }}</td>
            <td id="dados" data-toggle="modal" data-target="#exampleModal" data-descricao="{{ $value->descricao }}" data-data_de_execucao="{{ $value->data }}" data-data_de_criacao="{{ $value->c_created_at }}" data-nome="{{ $value->c_nome }}" data-id="{{ $value->c_id }}">{{ $value->c_nome }}</td>
            <td>{{ $value->e_serial }}</td>
            <td>{{ $value->equipamento->onibus->numero }}</td>
            <td>{{ $value->f_nome }}</td>

            <td>
                <form action="{{ route('nao-conformidade.destroy', $value->c_id) }}" style="margin:0px " method="POST" onsubmit = "return confirm('Tem certeza que deseja excluir ?')">        
                    <a type="submit" href="{{ route('nao-conformidade.edit', $value->c_id) }}" class="btn btn-warning">Editar</a>                       
                    @csrf
                    @method('DELETE')     
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>       
            </td>
        </tr>    



        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="nome" class="col-form-label">Nome</label>
                            <input disabled type="text" id="nome" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="data_de_criacao" class="col-form-label">Data de criação</label>
                            <input disabled type="text"  id="data_de_criacao" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="data_de_criacao" class="col-form-label">Data de execução</label>
                            <input disabled type="date" id="data_de_execucao" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="descricao" class="col-form-label">Descrição</label>
                            <textarea disabled rows="3" style="resize:none" id="descricao" class="form-control"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                        </div>
                    </form>
                </div>
               
                </div>
            </div>
        </div>

        @endforeach

    </tbody>
</table>
<div class="text-center">
    {{ $nao_conformidades->links() }}
</div>


<script>

    //INICIO SCRIPT MODAL - LISTAR DADOS
    $('#exampleModal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id                  = button.data('id')
    var nome                = button.data('nome')
    var data_de_criacao     = button.data('data_de_criacao')
    var data_de_execucao    = button.data('data_de_execucao')
    var descricao           = button.data('descricao')
    var status              = button.data('status')


    var modal = $(this)

    modal.find('.modal-title').text('Detalhes da Ação Imediata: ' + id)

    modal.find('.modal-body #nome').val(nome)
    modal.find('.modal-body #data_de_criacao').val(data_de_criacao)
    modal.find('.modal-body #data_de_execucao').val(data_de_execucao)
    modal.find('.modal-body #descricao').val(descricao)
    modal.find('.modal-body #status').val(status)


    })
    //FIM SCRIPT MODAL - LISTAR DADOS

</script>


@endsection
