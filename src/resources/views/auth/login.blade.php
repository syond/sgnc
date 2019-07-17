<!DOCTYPE HTML>
<html>
<head>
<title>SGNC - Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
</head>
<body>

@if(Auth::guest())

	<div class="login">
		
	<h1><a href="">SGNC</a></h1>

		<div class="login-bottom">
			
		@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif
			
			<h2>Login</h2>

			@include('layouts/flash-message')
			

			<form method="POST" action="{{ route('login') }}">

				@csrf

				<div class="col-md-6">

					<div class="login-mail">
						<input type="number" style="border:none;" name="matricula" placeholder="Matrícula" >
						

					</div>

					<div class="login-mail">
						<input type="password" style="border:none;" name="password" placeholder="Senha" >
						

					</div>

					<a class="news-letter " href="#" value="{{ old('remember') ? 'checked' : '' }}">
							<label class="checkbox1"><input type="checkbox" name="lembrarme" ><i> </i>Lembrar-me</label>
					</a>
					<a class="news-letter " href="{{ route('password.request') }}">
							<label class="esqueciminhasenha">Esqueci minha senha</label>
					</a>	
				</div>	

				<div class="col-md-6 login-do">
					<label class="hvr-shutter-in-horizontal login-sub">
						<input type="submit" value="login">
					</label>
				</div>
				
				<div class="clearfix"> </div>
			</form>



		</div>
	</div>
		<!---->
<div class="copy-right">
	<p> &copy; Universidade Estacio de Sá - Campus : Cabo Frio .</p>	    </div>  


@endif


<!---->
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>

