<!DOCTYPE HTML>
<html lang="{{ config('app.locale') }}">
<head>
<title>@yield('title', 'SNGC')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{{ asset('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type='text/css'> 
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" />
<!-- Mainly scripts -->
<script src="{{ asset('js/jquery.min.js') }}"> </script>
<script src="{{ asset('js/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
<!-- Custom and plugin javascript -->
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/screenfull.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>


<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
</script>

<script src="{{ asset('js/skycons.js') }}"></script>

<body>
