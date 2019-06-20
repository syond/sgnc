<style style="text/css">

    .table { margin: 0px auto; }
    .th { background: #e6e6e6; }

</style>

<div class="row">
    <div class="col-sm-2">
        <h1>Relatório de Não Conformidade</h1>
    </div>

    <div class="col-sm-4">
        <li><b>Empresa:</b> {{ $dados_nc->setor->empresa->nome_fantasia }}</li>
        <li><b>Setor:</b> {{ $dados_nc->setor->nome }}</li>
        <li><b>Período:</b> {{ \Carbon\Carbon::parse($dados_rnc->de_data)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($dados_rnc->ate_data)->format('d/m/Y') }}</li>
    </div>

    <div class="col-sm-6">
        <li><b>Descrição:</b> {{ $dados_rnc->descricao }} </li>
    </div>
    
</div>

<hr>

<table class="table" cellspacing="0" width="100%">
    <thead class="th" style="border-bottom: 1px solid #000;">        
        <tr>
            <th scope="col">Cod.</th>
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
            <th>Data RNC</th>
            <td>{{ \Carbon\Carbon::parse($dados_rnc->created_at)->format('d/m/Y') }}</td>
            <th>Total NC's</th>
            <td>{{ $qtd_nc }}</td>
        </tr>
    </tfoot>
</table>

