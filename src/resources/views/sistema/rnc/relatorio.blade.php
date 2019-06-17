@extends('layouts/layout')

@section('title', 'RNC')

@section('nav-map-name', 'Relatório de Não Conformidade')

@section('content')


<div class="row">
    <div class="col-sm-2">
        <h2>RNC</h2>
    </div>

    <div class="col-sm-4">
        <li>Empresa: {{ $dados_nc->setor->empresa->nome_fantasia }}</li>
        <li>Setor: {{ $dados_nc->setor->nome }}</li>
        <li>Período: {{ \Carbon\Carbon::parse($dados_rnc->de_data)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($dados_rnc->ate_data)->format('d/m/Y') }}</li>
    </div>

    <div class="col-sm-6">
        <li>Descrição: {{ $dados_rnc->descricao }} </li>
    </div>
    
</div>

<hr>

<table cellspacing="0" width="100%">
    <thead class="thead-dark" style="border-bottom: 1px solid #000;">        
        <tr>
            <th scope="col">CÓDIGO</th>
            <th scope="col">Data</th>
            <th scope="col">Nome</th>
            <th scope="col">Ônibus</th>
            <th scope="col">Equipamento</th>
            <th scope="col">Cod.Imediata</th>
            <th scope="col">Cod.Corretiva</th>
            <th scope="col">Técnico</th>
        </tr>
    </thead>        
    <tbody style="border-bottom: 1px solid #000;">
        @foreach($nao_conformidades as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y') }}</td>
                <td>{{ $value->nome }}</td>
                <td>{{ $value->equipamento->onibus->numero }}</td>
                <td>{{ $value->equipamento->serial }}</td>

                @if($value->imediata == null)
                    <td></td>
                    <td></td>
                @else

                    <td>{{ $value->imediata->id }}</td>
                    @if($value->imediata->corretiva == null)
                        <td></td>
                    @else
                        <td>{{ $value->imediata->corretiva->id }}</td>
                    @endif
                    
                @endif

                <td>{{ $value->funcionario->nome }}</td>
            </tr>
        @endforeach
    </tbody>

    <tfoot>
        <tr>
            <th scope="row">Data RNC</th>
            <td>{{ \Carbon\Carbon::parse($dados_rnc->created_at)->format('d/m/Y') }}</td>
            <th scope="row">Total NC's</th>
            <td>{{ $qtd_nc }}</td>
        </tr>
    </tfoot>
</table>

@endsection
