<nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="{{ url('dashboard') }}">SGNC</a></h1>         
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