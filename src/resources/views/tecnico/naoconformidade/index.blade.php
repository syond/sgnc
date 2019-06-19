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
        <div>
            <label for="tecnico">Técnico</label>
            <select name="tecnico" id="tecnico" class="form-control">
                <option value="" disabled selected></option>
                @foreach($funcionarios as $value)
                <option value="{{ $value->id }}">{{ $value->nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="onibus">Ônibus</label>
            <select name="onibus" id="onibus" class="form-control">
                <option value="" disabled selected></option>
                @foreach($onibus as $key => $value)
                    <option value="{{ $value->id }}">{{ $value->numero }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-sm-4">
        <div>
            <label for="setor">Setor</label>
            <select name="setor" id="setor" class="form-control">
                <option value="" disabled selected></option>
                @foreach($setores as $key => $value)
                <option value="{{ $value->id }}">{{ $value->nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="data">Data</label>
            <input type="date" style="border-radius: 4px; border-color: #aaa; height: 28px;" name="data" id="data" class="form-control">
        </div>
    </div>


    <div class="col-sm-4">
        <div>
            <form class="" action="{{ route('nao-conformidade.create') }}">
                <input type="button" id="filtrar" class="btn btn-alert btn-lg" value="Filtrar">
                <button class="btn btn-success btn-lg">Cadastrar</button>
            </form>
        </div>
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
            <th scope="col">Responsável</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>        
    <tbody>

        @foreach($nao_conformidades as $key => $value)

        <tr>
            <td>{{ $value->id }}</td>
            <td id="dados" data-toggle="modal" data-target="#exampleModal" data-setor="{{ $value->setor->nome }}" data-serial="{{ $value->equipamento->serial }}" data-onibus="{{ $value->equipamento->onibus->numero }}" data-descricao="{{ $value->descricao }}" data-data_de_criacao="{{ $value->created_at }}" data-nome="{{ $value->nome }}" data-id="{{ $value->id }}">{{ $value->nome }}</td>
            <td>{{ $value->funcionario->nome }}</td>

            <td>
                <form action="{{ route('nao-conformidade.destroy', $value->id) }}" style="margin:0px " method="POST" onsubmit = "return confirm('Tem certeza que deseja excluir ?')">        
                    <a type="submit" href="{{ route('nao-conformidade.edit', $value->id) }}" class="btn btn-warning">Editar</a>                       
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
                            <label for="setor" class="col-form-label">Setor</label>
                            <input disabled type="text" id="setor" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="onibus" class="col-form-label">Ônibus</label>
                            <input disabled type="text" id="onibus" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="serial" class="col-form-label">Serial do equipamento</label>
                            <input disabled type="text" id="serial" class="form-control">
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

$(document).ready(function(){
  $("#filtrar").click(function(){
    var tecnico = $("#tecnico").val();
    var onibus = $('#onibus').val();
    var setor = $('#setor').val();
    
    $.ajax({
      type: 'get',
      dataType: 'html',
      url: '{{url('/tecnico/nao-conformidade/filtro')}}',
      data: 'tecnico_id=' + tecnico + '&onibus_id=' + onibus + '&setor_id=' + setor,
      success:function(response){
        console.log(response);
        alert(response);
        $("#productData").html(response);
      }
    });
  });
});


$(document).ready(function() {
    $('#tecnico').select2({
        placeholder: 'Selecionar',
        allowClear: true,
    });
    $('#onibus').select2({
        placeholder: 'Selecionar',
        allowClear: true,
    });
    $('#setor').select2({
        placeholder: 'Selecionar',
        allowClear: true,
    });
});

    //INICIO SCRIPT MODAL - LISTAR DADOS
    $('#exampleModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var id                  = button.data('id')
        var nome                = button.data('nome')
        var data_de_criacao     = button.data('data_de_criacao')
        var onibus              = button.data('onibus')
        var serial              = button.data('serial')
        var descricao           = button.data('descricao')
        var setor               = button.data('setor')


        var modal = $(this)

        modal.find('.modal-title').text('Detalhes da Ação Imediata: ' + id)

        modal.find('.modal-body #nome').val(nome)
        modal.find('.modal-body #data_de_criacao').val(data_de_criacao)
        modal.find('.modal-body #onibus').val(onibus)
        modal.find('.modal-body #serial').val(serial)
        modal.find('.modal-body #descricao').val(descricao)
        modal.find('.modal-body #setor').val(setor)


    })
    //FIM SCRIPT MODAL - LISTAR DADOS

</script>


@endsection
