@extends('layouts.header')
		
        <!----->
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="index.html">Home</a></h1>         
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>	
			</section>
			<form class=" navbar-left-right">
              <input type="text"  value="Pesquisar..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Pesquisar...';}">
              <input type="submit" value="" class="fa fa-search">
            </form>
            <div class="clearfix"> </div>
           </div>
     
       
            <!-- Brand and toggle get grouped for better mobile display -->
		 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="drop-men" >
          <ul class=" nav_1">
             
        
        <li class="dropdown">
                <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">Usuário<i class="caret"></i></span><img src="images/wo.jpg"></a>
                <ul class="dropdown-menu " role="menu">
                  <li><a href="profile.html"><i class="fa fa-user"></i>Editar</a></li>
                  <li><a href="inbox.html"><i class="fa fa-envelope"></i>Mensagens</a></li>
                  <li><a href="calendar.html"><i class="fa fa-calendar"></i>Calendário</a></li>
                  <li><a href="inbox.html"><i class="fa fa-clipboard"></i>Tarefas</a></li>
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
                        <a href="index.html" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
                    </li>
				                   
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Administrador</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="graficos.html" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>Graficos</a></li>
                            
                            <li><a href="tecnico.html" class=" hvr-bounce-to-right"><i class="fa fa-save nav_icon"></i>Cadastrar Técnico</a></li>
							              <li><a href="onibus.html" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Ônibus</a></li>
							              <li><a href="empresa.html" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Empresa</a></li>
							              <li><a href="setor.html" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Setor</a></li>       
					   </ul>
                    </li>
					               
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-desktop nav_icon"></i> <span class="nav-label">Técnico</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="acaoimediata.html" class=" hvr-bounce-to-right"> <i class="fa fa-file-o nav_icon"></i>Ação Imediata</a></li>
							<li><a href="acaocorretiva.html" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Ação Corretiva</a></li>
							<li><a href="naoconformidade.html" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Não Conformidade</a></li>
                       </ul>
                    </li>
                     <li>
                        <a href="relatorio.html" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon"></i> <span class="nav-label">Relatório</span> </a>
                    </li>
                                                        
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-cog nav_icon"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="signin.html" class=" hvr-bounce-to-right"><i class="fa fa-sign-in nav_icon"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
			</div>
        </nav>
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
  </div>
  <!--banner-->	
		   <div class="banner">
		    	<h2>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Ônibus</span>
				</h2>
		    </div>
			<!----->
  
  		<!--//banner-->
 	<!--grid-->
 	<div class="grid-form">
    <div class="grid-form1">
    <h3 id="forms-example" class="">Cadastro de Ônibus</h3>
    <form>
      <div class="form-group">
   <label for="numero">Numero</label>
   <input type="text" class="form-control" id="numero" placeholder="0000">
 </div>
 <div class="form-group">
   <label for="placa">Placa</label>
   <input type="text" class="form-control" id="placa" placeholder="XXX-0000">
 </div>
 <div class="form-group">
   <label for="modelo">Modelo</label>
   <input type="text" class="form-control" id="modelo" placeholder="Modelo">
 </div>
 <div class="form-group">
   <label for="ano">Ano</label>
   <input type="text" class="form-control" id="ano" placeholder="2000">
 </div>
 </div>
 <button type="submit" class="btn btn-default">Enviar</button>
</form>
</div>
<!----->

		<!--//banner-->

 	<!--//grid-->
   <!---->
<div class="copy-right">
	<p> &copy; Universidade Estacio de Sá - Campus : Cabo Frio .</p>	    </div>
		</div>
		</div>
		<div class="clearfix"> </div>
       </div>
     
<!---->

</body>
</html>