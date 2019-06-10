@extends('layouts/layout')



@section('title', 'Cadastro de Funcionário')

@section('nav-map-name', 'Cadastro de Funcionário')
		    


@section('content')

  <h3 id="forms-example" class="">Cadastro de Funcionário</h3>
  <hr>
  <form method="POST" action="{{ route('funcionario.store') }}">  

      @csrf
            
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" placeholder="Nome" values="{{ old('nome') }}">
      </div>     
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email" values="{{ old('email') }}">
      </div>
      <div class="form-group">
        <label for="matricula">Matrícula</label>
        <input type="text" class="form-control" name="matricula" placeholder="Matricula" values="{{ old('matricula') }}">
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
          <option value="0" disabled selected>Selecione a Empresa</option>
          @foreach($empresas as $empresa)
            <option value="{{ $empresa->id }}">{{ $empresa->nome_fantasia }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="setor_id">Setor</label>
        <select name="setor_id" id="setor_id" class="form-control">
          <option value="0" disabled selected>Selecione o Setor</option>

          <option value=""></option>

        </select>
      </div>
      <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" name="password" placeholder="Senha" maxlength="8">
      </div>


      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
      
  </form>
  </div>

<div class="copy-right">
	<p> &copy; Universidade Estacio de Sá - Campus : Cabo Frio .</p>	    </div>
		</div>
		</div>
		<div class="clearfix"> </div>
       </div>
     

       <script type="text/javascript">
            $('#empresa_id').on('change', function(e){

              var empresa_id = e.target.value;

              $.get('/admin/funcionario/json-setor?empresa_id=' + empresa_id, function(data)
              {
                
                $('#setor_id').empty();
                $('#setor_id').append('<option value="" disabled selected>Selecione o Setor</option>');

                $.each(data, function(index, setorObj)
                {
                  $('#setor_id').append('<option value="'+ setorObj.id +'">'+ setorObj.nome +'</option>');
                });
              });
              
            });
          
        </script>


@endsection
