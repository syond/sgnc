<!DOCTYPE HTML>
<html>
<head>
<title>SGNC</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{{ asset('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"> 
<script src="{{ asset('js/jquery.min.js') }}"> </script>
<!-- Mainly scripts -->
<script src="{{ asset('js/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
<!-- Custom and plugin javascript -->
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/screenfull.js') }}"></script>
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

<!----->

<!--pie-chart--->
<script src="js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

</script>
<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--//skycons-icons-->
</head>
<body>


@if(Auth::check())


<div id="wrapper">

<!----->
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="index">Home</a></h1>         
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>	
			</section>
			<form class=" navbar-left-right">
              <input type="text"  value="Pesquisar..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
              <input type="submit" value="" class="fa fa-search">
            </form>
            <div class="clearfix"> </div>
           </div>
     
       
            <!-- Brand and toggle get grouped for better mobile display -->
		 
		   <!-- Brand and toggle get grouped for better mobile display -->
		 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		   <div class="drop-men" >
			<ul class=" nav_1">
			   
			
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">{{ Auth::user()->nome }}<i class="caret"></i></span><img src="images/wo.jpg"></a>
				  <ul class="dropdown-menu " role="menu">
					<li><a href="profile.html"><i class="fa fa-user"></i>Editar</a></li>
					<li><a href="inbox.html"><i class="fa fa-envelope"></i>Mensagens</a></li>
					<li><a href="calendar.html"><i class="fa fa-calendar"></i>Calendário</a></li>
					<li><a href="inbox.html"><i class="fa fa-clipboard"></i>Tarefas</a></li>
					<li><a href="{{ route('logout') }}"><i class="fa fa-sign-in"></i>Logout</a></li>
				  </ul>
				</li>
			   
			</ul>
		     </div><!-- /.navbar-collapse -->
			<div class="clearfix">
       
     </div>
	  
		    <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
				
                    <li>
                        <a href="index.html" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboard</span> </a>
                    </li>
                   
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Administrador</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="graficos.html" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>Graficos</a></li>
                            
							<li><a href="{{ url('admin/funcionario') }}" class=" hvr-bounce-to-right"><i class="fa fa-save nav_icon"></i>Cadastrar Funcionário</a></li>
							<li><a href="{{ url('admin/onibus') }}" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Ônibus</a></li>
							<li><a href="{{ url('admin/equipamento') }}" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Equipamento</a></li>
							<li><a href="{{ url('admin/empresa') }}" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Empresa</a></li>
							<li><a href="{{ url('admin/setor') }}" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Setor</a></li>							
					   </ul>
                    </li>
					                     
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-desktop nav_icon"></i> <span class="nav-label">Técnico</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{ url('tecnico/acao-imediata') }}" class=" hvr-bounce-to-right"> <i class="fa fa-file-o nav_icon"></i>Ação Imediata</a></li>
							<li><a href="{{ url('tecnico/acao-corretiva') }}" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Ação Corretiva</a></li>
							<li><a href="{{ url('tecnico/nao-conformidade') }}" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Não Conformidade</a></li>
                       </ul>
                    </li>
                     <li>
                        <a href="{{ url('relatorio') }}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon"></i> <span class="nav-label">Relatório</span> </a>
                    </li>
                           
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-cog nav_icon"></i> <span class="nav-label">Configurações</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{ route('logout') }}" class=" hvr-bounce-to-right"><i class="fa fa-sign-in nav_icon"></i>Logout</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </div>
			</div>
        </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
  		<!--banner-->	
		    <div class="banner">
		   
				<h2>
				<a href="{{ url('dashboard') }}">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Dashboard</span>
				</h2>
		    </div>
		<!--//banner-->
		<!--content-->
		<div class="content-top">
			
			<div class="col-md-1"></div>
			<div class="col-md-10">
			<div class="col-md-1"></div>
			
				<!---start-chart---->
				<!----->
				<div class="content-graph">
				<div class="content-color">
					<div class="content-ch"><p><i></i>Manutenções </p><span>100%</span>
					<div class="clearfix"> </div>
					</div>
					<div class="content-ch1"><p><i></i>Safari</p><span> 50%</span>
					<div class="clearfix"> </div>
					</div>
				</div>
				<!--graficos-->
		<link rel="stylesheet" href="css/graph.css">
		<!--//graph-->
							<script src="js/jquery.flot.js"></script>
									<script>
									$(document).ready(function () {
									
										// Graph Data ##############################################
										var graphData = [{
												// Visits
												data: [ [6, 1300], [7, 1600], [8, 1900], [9, 2100], [10, 2500], [11, 2200], [12, 2000], [13, 1950], [14, 1900], [15, 2000] ],
												color: '#999999'
											}, {
												// Returning Visits
												data: [ [6, 500], [7, 600], [8, 550], [9, 600], [10, 800], [11, 900], [12, 800], [13, 850], [14, 830], [15, 1000] ],
												color: '#999999',
												points: { radius: 4, fillColor: '#7f8c8d' }
											}
										];
									
										// Grafico de linhas #############################################
										$.plot($('#graph-lines'), graphData, {
											series: {
												points: {
													show: true,
													radius: 5
												},
												lines: {
													show: true
												},
												shadowSize: 0
											},
											grid: {
												color: '#7f8c8d',
												borderColor: 'transparent',
												borderWidth: 20,
												hoverable: true
											},
											xaxis: {
												tickColor: 'transparent',
												tickDecimals: 2
											},
											yaxis: {
												tickSize: 1000
											}
										});
									
										// Grafico de barras ##############################################
										$.plot($('#graph-bars'), graphData, {
											series: {
												bars: {
													show: true,
													barWidth: .9,
													align: 'center'
												},
												shadowSize: 0
											},
											grid: {
												color: '#7f8c8d',
												borderColor: 'transparent',
												borderWidth: 20,
												hoverable: true
											},
											xaxis: {
												tickColor: 'transparent',
												tickDecimals: 2
											},
											yaxis: {
												tickSize: 1000
											}
										});
									
										// Graph Toggle ############################################
										$('#graph-bars').hide();
									
										$('#lines').on('click', function (e) {
											$('#bars').removeClass('active');
											$('#graph-bars').fadeOut();
											$(this).addClass('active');
											$('#graph-lines').fadeIn();
											e.preventDefault();
										});
									
										$('#bars').on('click', function (e) {
											$('#lines').removeClass('active');
											$('#graph-lines').fadeOut();
											$(this).addClass('active');
											$('#graph-bars').fadeIn().removeClass('hidden');
											e.preventDefault();
										});
									
										// Tooltip #################################################
										function showTooltip(x, y, contents) {
											$('<div id="tooltip">' + contents + '</div>').css({
												top: y - 16,
												left: x + 20
											}).appendTo('body').fadeIn();
										}
									
										var previousPoint = null;
									
										$('#graph-lines, #graph-bars').bind('plothover', function (event, pos, item) {
											if (item) {
												if (previousPoint != item.dataIndex) {
													previousPoint = item.dataIndex;
													$('#tooltip').remove();
													var x = item.datapoint[0],
														y = item.datapoint[1];
														showTooltip(item.pageX, item.pageY, y + ' visitors at ' + x + '.00h');
												}
											} else {
												$('#tooltip').remove();
												previousPoint = null;
											}
										});
									
									});
									</script>
				<div class="graph-container">
									
									<div id="graph-bars"> </div>
									<div id="graph-lines"> </div>
								</div>
	
		</div>
		</div>
		<div class="clearfix"> </div>
		</div>		
<!---->
<div class="copy-right">
	<p> &copy; Universidade Estacio de Sá - Campus : Cabo Frio .</p>	    </div>

<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<script src="js/bootstrap.min.js"> </script>


@endif


</body>
</html>

