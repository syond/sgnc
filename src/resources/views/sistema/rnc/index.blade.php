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

        @foreach($rnc as $key => $value)  
        <tr>
            <td id="dados" data-toggle="modal" data-target="#exampleModal" data-tecnico="{{ $value->funcionario->nome }}" data-de_data="{{ \Carbon\Carbon::parse($value->de_data)->format('d/m/Y') }}" data-ate_data="{{ \Carbon\Carbon::parse($value->ate_data)->format('d/m/Y') }}" data-setor="{{ $value->setor->nome }}" data-descricao="{{ $value->descricao }}" data-data="{{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y') }}" data-empresa="{{ $value->setor->empresa->nome_fantasia }}" data-id="{{ $value->id }}">{{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y') }}</td>

            
            <td>{{ $value->descricao }}</td>
                    
                    

            <td>
                <form action="{{ route('rnc.destroy', $value->id) }}" style="margin:0px " method="POST" onsubmit = "return confirm('Tem certeza que deseja excluir ?')">                             
                    <a type="submit" href="{{ route('rnc.relatorio', $value->id) }}" class="btn btn-warning">Visualizar</a>
                    <a type="submit" href="#" class="btn btn-warning">Imprimir</a>
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
                        <label for="data" class="col-form-label">Data de criação</label>
                        <input disabled type="text" id="data" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="de_data" class="col-form-label">Data Inicial</label>
                        <input disabled type="text" id="de_data" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="ate_data" class="col-form-label">Data Final</label>
                        <input disabled type="text" id="ate_data" class="form-control">
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
                        <label for="tecnico" class="col-form-label">Técnico</label>
                        <input disabled type="text" id="tecnico" class="form-control">
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
        var tecnico             = button.data('tecnico')
        var supervisor          = button.data('supervisor')
        var de_data             = button.data('de_data')
        var ate_data            = button.data('ate_data')
        


    var modal = $(this)

    modal.find('.modal-title').text('Detalhes do Relatório de Não Conformidade: ' + id)

        modal.find('.modal-body #data').val(data)
        modal.find('.modal-body #empresa').val(empresa)
        modal.find('.modal-body #setor').val(setor)
        modal.find('.modal-body #onibus').val(onibus)
        modal.find('.modal-body #serial').val(serial)
        modal.find('.modal-body #nao_conformidade').val(nao_conformidade)
        modal.find('.modal-body #corretiva').val(corretiva)
        modal.find('.modal-body #imediata').val(imediata)
        modal.find('.modal-body #descricao').val(descricao)
        modal.find('.modal-body #tecnico').val(tecnico)
        modal.find('.modal-body #supervisor').val(supervisor)
        modal.find('.modal-body #de_data').val(de_data)
        modal.find('.modal-body #ate_data').val(ate_data)
        


    })
    //FIM SCRIPT MODAL - LISTAR DADOS

</script>



@endsection
