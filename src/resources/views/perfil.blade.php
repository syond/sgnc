@extends('layouts/layout')

@section('title', 'Perfil')

@section('content')


 	 <div class=" profile">

		<div class="profile-bottom">
			<h3><i class="fa fa-user"></i>Perfil</h3>
			<div class="profile-bottom-top">
			<div class="col-md-4 profile-bottom-img">
				<img src="images/pr.jpg" alt="">
				<center><a type="file" href="#">Alterar foto</a></center>
			</div>
			<div class="col-md-8 profile-text">
				<h6>{{ Auth::user()->nome }}</h6>
				<table>

				<tr><td>Função</td>  
				<td>:</td>  
				@if(Auth::user()->nivel == 1)
					<td>Supervisor</td></tr>
					@else
						<td>Técnico</td></tr>
				@endif

				<tr><td>Empresa</td>  
				<td>:</td>  
				<td>{{ Auth::user()->empresa->nome_fantasia }}</td></tr>

				<tr><td>Setor</td>  
				<td>:</td>  
				<td>{{ Auth::user()->setor->nome }}</td></tr>
				
				<tr>
				<td>Email</td>
				<td> :</td>
				<td><a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></td>
				</tr>
				<tr>
				<td>Skills</td>
				<td> :</td>
				<td> HTML, CSS,Jqury, Bootstrap</td>
				</tr>
				<tr>
				<td>Country </td>
				<td>:</td>
				<td> United Arab Emirates</td>
				</tr>
				</table>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="profile-bottom-bottom">

			<div class="form-group">
				<label for="senha">Senha antiga</label>
        		<input type="password" class="form-control" name="password" >
			</div>
			<div class="form-group">
				<label for="senha">Nova senha</label>
        		<input type="password" class="form-control" name="password" >
			</div>

			<div class="col-md-4 profile-fo">
				<h4>23,5k</h4>
				<p>Followers</p>
				<a href="#" class="pro"><i class="fa fa-plus-circle"></i>Follow</a>
			</div>
			<div class="col-md-4 profile-fo">
				<h4>348</h4>
				<p>Following</p>
				<a href="#" class="pro1"><i class="fa fa-user"></i>View Profile</a>
			</div>
			<div class="col-md-4 profile-fo">
				<h4>23,5k</h4>
				<p>Snippets</p>
				<a href="#"><i class="fa fa-cog"></i>Options</a>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="profile-btn">

                <button type="button" href="#" class="btn bg-red">Save changes</button>
           <div class="clearfix"></div>
			</div>
			 
			
		</div>
	</div>



@endsection