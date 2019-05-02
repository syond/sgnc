<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index do Empresa</title>
</head>
<body>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table border="1" class="">
        <thead>
            <tr>
                <td>ID</td>
                <td>CNPJ</td>
                <td>Nome Fantasia</td>
                <td>Razão Social</td>
            </tr>
        </thead>
        <tbody>

        @foreach($empresa as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->cnpj }}</td>
                <td>{{ $value->nome_fantasia }}</td>
                <td>{{ $value->razao_social }}</td>

                <td>

                    <a class="" href="{{ route('empresa.edit', $value->id) }}">Editar</a>

                    <form action="{{ route('empresa.destroy', $value->id) }}" method="POST">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}


                            
                            <button type="submit" class="btn btn-primary">Excluir</button>

                    </form>


                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <br>

    <a href="{{ route('empresa.create') }}">Cadastrar</a><br>

</body>
</html>