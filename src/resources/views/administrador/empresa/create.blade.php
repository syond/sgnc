@extends('layouts/layout')



@section('title', 'Cadastro de Empresa')

@section('nav-map-name', 'Cadastro de Empresa')
		    


@section('content')



 	<div class="grid-form">
    <div class="grid-form1">
    <h3 id="forms-example" class="">Cadastro de Empresa</h3>


    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif


    

    <form method="POST" action="{{ route('empresa.store') }}">

      @csrf


      <div class="form-group">
        <label for="cnpj">CNPJ</label>
        <input type="text" class="form-control" name="cnpj" placeholder="00.000.000/0000-00">
      </div>
      <div class="form-group">
        <label for="razaoSocial">Razão Social</label>
        <input type="text" class="form-control" name="razao_social" placeholder="Empresa de Ônibus.S/A">
      </div>
      <div class="form-group">
        <label for="nomeFantasia">Nome Fantasia</label>
        <input type="text" class="form-control" name="nome_fantasia" placeholder="Empresa de Ônibus">
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