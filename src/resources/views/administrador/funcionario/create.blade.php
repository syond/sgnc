@extends('layouts/layout')



@section('title', 'Cadastro de Funcionário')

@section('nav-map-name', 'Cadastro de Funcionário')
		    


@section('content')


 	<div class="grid-form">
      <div class="grid-form1">
          <h3 id="forms-example" class="">Cadastro de Funcionário</h3>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif

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
        <label for="senha">Senha</label>
        <input type="password" class="form-control" name="password" placeholder="Senha">
      </div>
    </div>
      <button type="submit" class="btn btn-default">Enviar</button>
  </form>
  </div>

<div class="copy-right">
	<p> &copy; Universidade Estacio de Sá - Campus : Cabo Frio .</p>	    </div>
		</div>
		</div>
		<div class="clearfix"> </div>
       </div>
     

@endsection


</body>
</html>

