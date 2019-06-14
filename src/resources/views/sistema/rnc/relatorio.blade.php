@extends('layouts/layout')

@section('title', 'RNC')

@section('nav-map-name', 'Relatório de Não Conformidade')

@section('content')


<div class="row">
    <div class="col-sm-6">
        <h2>RNC</h2>
    </div>

    <div class="col-sm-6">
        <li>Empresa: {{ $dados_nc->setor->empresa->nome_fantasia }}</li>
        <li>Setor: {{ $dados_nc->setor->nome }}</li>
        <li>Período: {{ \Carbon\Carbon::parse($dados_rnc->de_data)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($dados_rnc->ate_data)->format('d/m/Y') }}</li>
        <li>Descrição: {{ $dados_rnc->descricao }} </li>
    </div>
    
</div>
<hr>
<table cellspacing="0" width="100%">
    <thead class="thead-dark">        
        <tr>
            <th scope="col">CÓDIGO</th>
            <th scope="col">Nome</th>
            <th scope="col">Ônibus</th>
            <th scope="col">Equipamento</th>
            <th scope="col">Técnico</th>
        </tr>
    </thead>        
    <tbody>
        @foreach($nao_conformidades as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->nome }}</td>
                <td>{{ $value->equipamento->onibus->numero }}</td>
                <td>{{ $value->equipamento->serial }}</td>
                <td>{{ $value->funcionario->nome }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
