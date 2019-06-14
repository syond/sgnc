

<table border="1" cellspacing="0" width="100%">
    <thead class="thead-dark">
        <div class="">
            <h2>RNC</h2>
        </div>
        <div class="">
            <li>Empresa: </li>
            
        
        </div>

        <br>
        
        <tr>
            <th scope="col">CÓDIGO</th>
            <th scope="col">Nome</th>
            <th scope="col">Ônibus</th>
            <th scope="col">Equipamento</th>
            <th scope="col">Funcionário</th>
        </tr>
    </thead>        
    <tbody>
        @foreach($nao_conformidades as $key => $value)
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
