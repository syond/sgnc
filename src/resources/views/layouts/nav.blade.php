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
        	  
            <div class="clearfix"> </div>
           </div>
     

		    <div class="drop-men" >
          <ul class=" nav_1">
             
        
        <li class="dropdown">
                <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">{{ Auth::user()->nome }}<i class="caret"></i></span><img width="60" height="60" src="{{ asset('images/wo.png') }}"></a>
                <ul class="dropdown-menu " role="menu">
                  <li><a href="{{ route('logout') }}"><i class="fa fa-sign-in"></i>Logout</a></li>
                </ul>
              </li>
             
          </ul>
		     </div><!-- /.navbar-collapse -->
			<div class="clearfix">
       
     </div>