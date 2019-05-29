@extends('layouts/layout')

@section('title', 'Editar Funcionário')

@section('nav-map-name', 'Editar Funcionário')
		    

@section('content')

  <h3 id="forms-example" class="">Editar Funcionário</h3>
  <hr>
  <form method="POST" action="{{ route('funcionario.update', $funcionario->id) }}">

      @csrf
      @method('PATCH')

      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" value="{{ old('funcionarios', $funcionario->nome) }}">
      </div>     
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="{{ old('funcionarios', $funcionario->email) }}">
      </div>
      <div class="form-group">
        <label for="matricula">Matrícula</label>
        <input type="text" class="form-control" name="matricula" value="{{ old('funcionarios', $funcionario->matricula) }}">
      </div>
      <div class="form-group">
        <label for="nivel">Nível de Acesso</label>
        <select name="nivel" class="form-control">
          <option value="" disabled>Nível de Acesso</option>
          <option value="1">Administrador</option>
          <option value="0">Técnico</option>
        </select>
      </div>
      <div class="form-group">
        <label for="senha">Senha antiga</label>
        <input type="password" class="form-control" name="password" >
      </div>
      <div class="form-group">
        <label for="senha">Nova senha</label>
        <input type="password" class="form-control" name="password" >
      </div>
    </div>

    <button type="submit" class="btn btn-default">Enviar</button>
  </form>
  </div>

@endsection
