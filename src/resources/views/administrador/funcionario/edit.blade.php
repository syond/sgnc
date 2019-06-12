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
                <label for="empresa_id">Empresa</label>
                <select name="empresa_id" id="empresa_id" class="form-control">
                @if($funcionario->empresa == null)
                  <option value="0" disabled selected>Selecione uma Empresa</option>
                  @foreach($empresas as $empresa)
                    <option value="{{ $empresa->id }}">{{ $empresa->nome_fantasia }}</option>
                  @endforeach
                @else
                  <option value="0" disabled selected>{{ $funcionario->empresa->nome_fantasia }}</option>
                  @foreach($empresas as $empresa)
                    <option value="{{ $empresa->id }}">{{ $empresa->nome_fantasia }}</option>
                  @endforeach
                @endif
                        
                </select>
            </div>
      <div class="form-group">
        <label for="setor_id">Setor</label>
        <select name="setor_id" id="setor_id" class="form-control">
                @if($funcionario->setor == null)
                  <option value="0" disabled selected>Selecione um Setor</option>
                @else
                  <option value="{{ $funcionario->setor->id }}" disabled selected>{{ $funcionario->setor->nome }}</option>
                @endif
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



  <script type="text/javascript">
            $('#empresa_id').on('change', function(e){

              var empresa_id = e.target.value;

              $.get('/admin/funcionario/json-setor?empresa_id=' + empresa_id, function(data)
              {
                
                $('#setor_id').empty();

                $.each(data, function(index, setorObj)
                {
                  $('#setor_id').append('<option value="'+ setorObj.id +'">'+ setorObj.nome +'</option>');
                });
              });
              
            });
          
        </script>

@endsection
