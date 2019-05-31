@extends('layouts/layout')

@section('title', 'Ação Imediata')

@section('nav-map-name', 'Ação Imediata')

@section('content')


<style style="text/css">
  	#dados:hover {
          background-color: #f2f2f2;
          cursor: pointer;
        }
</style>


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
            <th scope="col">Status</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>        
    <tbody>

        @foreach($imediatas as $key => $value)

        <tr id="dados" data-toggle="modal" data-target="#exampleModal" data-status="{{ $value->status }}" data-descricao="{{ $value->descricao }}" data-data_de_execucao="{{ $value->data }}" data-data_de_criacao="{{ $value->created_at }}" data-nome="{{ $value->nome }}" data-id="{{ $value->id }}">
            <td>{{ $value->id }}</td>
            <td>{{ $value->nome }}</td>
            <td>{{ $value->serial }}</td>
            <td>{{ $value->onibus->numero }}</td>
            <td>{{ $value->funcionario_id }}</td>
            
            @if($value->status == 0)
                <td><span class="badge badge-warning">Pendente</span></td>
            @endif
            @if($value->status == 1)
                <td><span class="badge badge-primary">Em andamento</span></td>
            @endif
            @if($value->status == 2)
                <td><span class="badge badge-success">Encerrado</span></td>
            @endif

            <td>
                <form action="{{ route('acao-imediata.destroy', $value->id) }}" style="margin:0px " method="POST" onsubmit = "return confirm('Tem certeza que deseja excluir ?')">        
                    <a type="submit" href="{{ route('acao-imediata.edit', $value->id) }}" class="btn btn-warning">Editar</a>                       
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
                    <form method="POST" action="{{ route('acao-imediata.update', $value->id) }}">
                    @csrf
                    @method('PATCH')
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
                        <div class="form-group">
                            <label for="status">Alterar status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="" disabled selected>Selecione o status</option>
                                <option value="0">Pendente</option>
                                <option value="1">Em andamento</option>
                                <option value="2">Encerrado</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <input type="submit" class="btn btn-primary"></a>
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
    {{ $imediatas->links() }}
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
    


    //INICIO SCRIPT SELECT
    $('#empresa').on('change', function(e){
      console.log(e);

      var empresa_id = e.target.value;

      $.get('/tecnico/acao-imediata/json-onibus?empresa_id=' + empresa_id, function(data)
      {
        console.log(data);
        
        $('#onibus_id').empty();
        $('#onibus_id').append('<option value="" disabled selected>Selecione o Ônibus</option>');

        $.each(data, function(index, onibusObj)
        {
          $('#onibus_id').append('<option value="'+ onibusObj.id +'">'+ onibusObj.numero +'</option>');
        });
      });
      
    });



    $('#onibus_id').on('change', function(e){
      console.log(e);

      var onibus_id = e.target.value;

      $.get('/tecnico/acao-imediata/json-equipamento?onibus_id=' + onibus_id, function(data)
      {
        console.log(data);
        
        $('#equipamento_id').empty();
        $('#equipamento_id').append('<option value="" disabled selected>Selecione o Equipamento</option>');

        $.each(data, function(index, equipamentoObj)
        {
          $('#equipamento_id').append('<option value="'+ equipamentoObj.id +'">'+ equipamentoObj.serial +'</option>');
        });
      });
      
    });
    //FIM SCRIPT SELECT

</script>

@endsection
