<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Editar Empresa</h2>

        <form method="POST" action="{{ route('empresa.update', $empresa->id) }}">

            @csrf
            @method('PATCH')

            CNPJ: <input type="text" name="cnpj">
            Nome Fantasia: <input type="text" name="nome_fantasia">
            Razão Social: <input type="text" name="razao_social">

            <input type="submit" value="Atualizar">
        </form>
</body>
</html>