@extends('layouts/layout')

@section('title', 'RNC')

@section('nav-map-name', 'Relatório de Não Conformidade')

@section('content')

<style style="text/css">
  	#dados:hover {
          background-color: #f2f2f2;
          cursor: pointer;
        }
</style>

<h3 id="forms-example" class="">Relatório de Não Conformidade</h3>
<hr>
<div class="row">
    <div class="col-sm-6">
        <form class="" action="{{ route('rnc.create') }}">
            <button class="btn btn-success btn-lg">Cadastrar</button>
        </form>
    </div>
    <div class="col-sm-6">
        <form class="navbar-left-right" action="{{ route('rnc.search') }}">
            <input type="text"  value="Buscar..." name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Buscar...';}">
            <input type="submit" value="" class="fa fa-search">
        </form>  
    </div>
</div>       
<hr>
<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <thead class="thead-dark">
        <div class="">
            <h4>RNC's Cadastrados</h4>
        </div><br>
        <tr>
            <th scope="col">Data</th>
            <th scope="col">Descrição</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>        
    <tbody>
    @dd($teste)
        @foreach($rnc as $key => $value)         

        <tr>
            <td>{{ $value->created_at }}</td>
            <td id="dados" data-toggle="modal" data-target="#exampleModal" data-setor="{{ $value->setor->nome }}" data-serial="{{ $value->equipamento->serial }}" data-onibus="{{ $value->onibus->numero }}" data-descricao="{{ $value->descricao }}" data-data="{{ $value->created_at }}" data-empresa="{{ $value->empresa->nome_fantasia }}" data-nao_conformidade="id="dados" data-toggle="modal" data-target="#exampleModal" data-setor="{{ $value->setor->nome }}" data-serial="{{ $value->equipamento->serial }}" data-onibus="{{ $value->onibus->numero }}" data-descricao="{{ $value->descricao }}" data-data="{{ $value->created_at }}" data-empresa="{{ $value->empresa->nome_fantasia }}" data-nao_conformidade="{{ $value->naoconformidade->nome }}" data-corretiva="{{ $value->corretiva->nome }}" data-imediata="{{ $value->imediata->nome }}" data-id="{{ $value->id }}">{{ $value->descricao }}>" data-corretiva="{{ $value->corretiva->nome }}" data-imediata="{{ $value->imediata->nome }}" data-id="{{ $value->id }}">{{ $value->descricao }}</td>
                    
                    

            <td>
                <form action="{{ route('rnc.destroy', $value->id) }}" style="margin:0px " method="POST" onsubmit = "return confirm('Tem certeza que deseja excluir ?')">        
                    <a type="submit" href="{{ route('rnc.edit', $value->id) }}" class="btn btn-warning">Editar</a>                       
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
                        <label for="data" class="col-form-label">Data</label>
                        <input disabled type="text" id="data" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="empresa" class="col-form-label">Empresa</label>
                        <input disabled type="text"  id="empresa" class="form-control">
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
                        <label for="serial" class="col-form-label">Serial do Equipamento</label>
                        <input disabled type="text" id="serial" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nao_conformidade" class="col-form-label">Ação de Não Conformidade</label>
                        <input disabled type="text" id="nao_conformidade" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="corretiva" class="col-form-label">Ação Corretiva</label>
                        <input disabled type="text" id="corretiva" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="imediata" class="col-form-label">Ação Imediata</label>
                        <input disabled type="text" id="imediata" class="form-control">
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



        @endforeach

    </tbody>
</table>
<div class="text-center">
    {{ $rnc->links() }}            
</div>



<script>

    //INICIO SCRIPT MODAL - LISTAR DADOS
    $('#exampleModal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
        var id                  = button.data('id')
        var data                = button.data('data')
        var empresa             = button.data('empresa')
        var setor               = button.data('setor')
        var onibus              = button.data('onibus')
        var serial              = button.data('serial')
        var nao_conformidade    = button.data('nao_conformidade')
        var corretiva           = button.data('corretiva')
        var imediata            = button.data('imediata')
        var descricao           = button.data('descricao')
        


    var modal = $(this)

    modal.find('.modal-title').text('Detalhes da Ação Corretiva: ' + id)

        modal.find('.modal-body #data').val(data)
        modal.find('.modal-body #empresa').val(empresa)
        modal.find('.modal-body #setor').val(setor)
        modal.find('.modal-body #onibus').val(onibus)
        modal.find('.modal-body #serial').val(serial)
        modal.find('.modal-body #nao_conformidade').val(nao_conformidade)
        modal.find('.modal-body #corretiva').val(corretiva)
        modal.find('.modal-body #imediata').val(imediata)
        modal.find('.modal-body #descricao').val(descricao)
        


    })
    //FIM SCRIPT MODAL - LISTAR DADOS

</script>



@endsection
