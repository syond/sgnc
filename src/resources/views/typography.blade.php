
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Minimal an Admin Panel Category Flat Bootstrap Responsive Website Template | Typography :: w3layouts</title>
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
  
<!-- Mainly scripts -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="css/custom.css" rel="stylesheet">
<script src="js/custom.js"></script>
<script src="js/screenfull.js"></script>
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


</head>
<body>
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
               <h1> <a class="navbar-brand" href="index.html">Minimal</a></h1>         
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>	
			</section>
			<form class=" navbar-left-right">
              <input type="text"  value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
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
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Menu Levels</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="graphs.html" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>Graphs</a></li>
                            
                            <li><a href="maps.html" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>Maps</a></li>
			
						<li><a href="typography.html" class=" hvr-bounce-to-right"><i class="fa fa-file-text-o nav_icon"></i>Typography</a></li>

					   </ul>
                    </li>
					 <li>
                        <a href="inbox.html" class=" hvr-bounce-to-right"><i class="fa fa-inbox nav_icon"></i> <span class="nav-label">Inbox</span> </a>
                    </li>
                    
                    <li>
                        <a href="gallery.html" class=" hvr-bounce-to-right"><i class="fa fa-picture-o nav_icon"></i> <span class="nav-label">Gallery</span> </a>
                    </li>
                     <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-desktop nav_icon"></i> <span class="nav-label">Pages</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="404.html" class=" hvr-bounce-to-right"> <i class="fa fa-info-circle nav_icon"></i>Error 404</a></li>
                            <li><a href="faq.html" class=" hvr-bounce-to-right"><i class="fa fa-question-circle nav_icon"></i>FAQ</a></li>
                            <li><a href="blank.html" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Blank</a></li>
                       </ul>
                    </li>
                     <li>
                        <a href="layout.html" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon"></i> <span class="nav-label">Grid Layouts</span> </a>
                    </li>
                   
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-list nav_icon"></i> <span class="nav-label">Forms</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="forms.html" class=" hvr-bounce-to-right"><i class="fa fa-align-left nav_icon"></i>Basic forms</a></li>
                            <li><a href="validation.html" class=" hvr-bounce-to-right"><i class="fa fa-check-square-o nav_icon"></i>Validation</a></li>
                        </ul>
                    </li>
                   
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-cog nav_icon"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="signin.html" class=" hvr-bounce-to-right"><i class="fa fa-sign-in nav_icon"></i>Signin</a></li>
                            <li><a href="signup.html" class=" hvr-bounce-to-right"><i class="fa fa-sign-in nav_icon"></i>Singup</a></li>
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
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Typography</span>
				</h2>
		    </div>
		<!--//banner-->
 	<!--grid-->
 	<div class="typo-grid">
 	  
        <div class="typo-1">
  <div class="grid_3 grid_4">
  <h3 class="head-top">Headings</h3>
  <div class="bs-example">
    <table class="table">
      <tbody>
        <tr>
          <td><h1 id="h1.-bootstrap-heading">h1. Bootstrap heading<a class="anchorjs-link" href="#h1.-bootstrap-heading"><span class="anchorjs-icon"></span></a></h1></td>
          <td class="type-info">Semibold 36px</td>
        </tr>
        <tr>
          <td><h2 id="h2.-bootstrap-heading">h2. Bootstrap heading<a class="anchorjs-link" href="#h2.-bootstrap-heading"><span class="anchorjs-icon"></span></a></h2></td>
          <td class="type-info">Semibold 30px</td>
        </tr>
        <tr>
          <td><h3 id="h3.-bootstrap-heading">h3. Bootstrap heading<a class="anchorjs-link" href="#h3.-bootstrap-heading"><span class="anchorjs-icon"></span></a></h3></td>
          <td class="type-info">Semibold 24px</td>
        </tr>
        <tr>
          <td><h4 id="h4.-bootstrap-heading">h4. Bootstrap heading<a class="anchorjs-link" href="#h4.-bootstrap-heading"><span class="anchorjs-icon"></span></a></h4></td>
          <td class="type-info">Semibold 18px</td>
        </tr>
        <tr>
          <td><h5 id="h5.-bootstrap-heading">h5. Bootstrap heading<a class="anchorjs-link" href="#h5.-bootstrap-heading"><span class="anchorjs-icon"></span></a></h5></td>
          <td class="type-info">Semibold 14px</td>
        </tr>
        <tr>
          <td><h6>h6. Bootstrap heading</h6></td>
          <td class="type-info">Semibold 12px</td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>
  <div class="grid_3 grid_5">
  	<h3 class="head-top">Buttons</h3>
  	 <div class="but_list">
      <p>
        <button type="button" class="btn btn-lg btn-default">Default</button>
        <button type="button" class="btn btn-lg btn-primary">Primary</button>
        <button type="button" class="btn btn-lg btn-success warning_1">Success</button>
        <button type="button" class="btn btn-lg btn-info">Info</button>
        <button type="button" class="btn btn-lg btn-warning warning_11">Warning</button>
        <button type="button" class="btn btn-lg btn-danger">Danger</button>
        <button type="button" class="btn btn-lg btn-link">Link</button>
      </p>
      <p>
        <button type="button" class="btn btn-default">Default</button>
        <button type="button" class="btn btn-primary">Primary</button>
        <button type="button" class="btn btn-success warning_2">Success</button>
        <button type="button" class="btn btn-info">Info</button>
        <button type="button" class="btn btn-warning warning_22">Warning</button>
        <button type="button" class="btn btn-danger">Danger</button>
        <button type="button" class="btn btn-link">Link</button>
      </p>
      <p>
        <button type="button" class="btn btn-sm btn-default">Default</button>
        <button type="button" class="btn btn-sm btn-primary">Primary</button>
        <button type="button" class="btn btn-sm btn-success warning_3">Success</button>
        <button type="button" class="btn btn-sm btn-info">Info</button>
        <button type="button" class="btn btn-sm btn-warning warning_33">Warning</button>
        <button type="button" class="btn btn-sm btn-danger">Danger</button>
        <button type="button" class="btn btn-sm btn-link">Link</button>
      </p>
      <p>
        <button type="button" class="btn btn-xs btn-default">Default</button>
        <button type="button" class="btn btn-xs btn-primary">Primary</button>
        <button type="button" class="btn btn-xs btn-success warning_4">Success</button>
        <button type="button" class="btn btn-xs btn-info">Info</button>
        <button type="button" class="btn btn-xs btn-warning warning_44">Warning</button>
        <button type="button" class="btn btn-xs btn-danger">Danger</button>
        <button type="button" class="btn btn-xs btn-link">Link</button>
      </p>
    </div>
  </div>
  <div class="grid_3 grid_5">
  	<h3 class="head-top">Labels</h3>
     <div class="but_list">
      <h1>
        <span class="label label-default">Default</span>
        <span class="label label-primary">Primary</span>
        <span class="label label-success">Success</span>
        <span class="label label-info">Info</span>
        <span class="label label-warning">Warning</span>
        <span class="label label-danger">Danger</span>
      </h1>
      <h2>
        <span class="label label-default">Default</span>
        <span class="label label-primary">Primary</span>
        <span class="label label-success">Success</span>
        <span class="label label-info">Info</span>
        <span class="label label-warning">Warning</span>
        <span class="label label-danger">Danger</span>
      </h2>
      <h3>
        <span class="label label-default">Default</span>
        <span class="label label-primary">Primary</span>
        <span class="label label-success">Success</span>
        <span class="label label-info">Info</span>
        <span class="label label-warning">Warning</span>
        <span class="label label-danger">Danger</span>
      </h3>
      <h4>
        <span class="label label-default">Default</span>
        <span class="label label-primary">Primary</span>
        <span class="label label-success">Success</span>
        <span class="label label-info">Info</span>
        <span class="label label-warning">Warning</span>
        <span class="label label-danger">Danger</span>
      </h4>
      <h5>
        <span class="label label-default">Default</span>
        <span class="label label-primary">Primary</span>
        <span class="label label-success">Success</span>
        <span class="label label-info">Info</span>
        <span class="label label-warning">Warning</span>
        <span class="label label-danger">Danger</span>
      </h5>
      <h6>
        <span class="label label-default">Default</span>
        <span class="label label-primary">Primary</span>
        <span class="label label-success">Success</span>
        <span class="label label-info">Info</span>
        <span class="label label-warning">Warning</span>
        <span class="label label-danger">Danger</span>
      </h6>
     </div>
   </div>
   <div class="grid_3 grid_5">
     <h3 class="head-top">Progress Bars</h3>
         <div class="tab-content">
              <div class="tab-pane active" id="domprogress">
                  <div class="progress">    
                    <div class="progress-bar progress-bar-primary" style="width: 20%"></div>
                  </div>
                  <p>Info with <code>progress-bar-info</code> class.</p>
                  <div class="progress">    
                    <div class="progress-bar progress-bar-info" style="width: 60%"></div>
                  </div>
                  <p>Success with <code>progress-bar-success</code> class.</p>
                  <div class="progress">
                    <div class="progress-bar progress-bar-success" style="width: 30%"></div>
                  </div>
                  <p>Warning with <code>progress-bar-warning</code> class.</p>
                  <div class="progress">
                    <div class="progress-bar progress-bar-warning" style="width: 70%"></div>
                  </div>
                  <p>Danger with <code>progress-bar-danger</code> class.</p>
                  <div class="progress">
                    <div class="progress-bar progress-bar-danger" style="width: 50%"></div>
                  </div>
                  <p>Inverse with <code>progress-bar-inverse</code> class.</p>
                  <div class="progress">
                    <div class="progress-bar progress-bar-inverse" style="width: 40%"></div>
                  </div>
                   <p>Inverse with <code>progress-bar-inverse</code> class.</p>
                  <div class="progress">
                    <div class="progress-bar progress-bar-success" style="width: 35%"><span class="sr-only">35% Complete (success)</span></div>
                    <div class="progress-bar progress-bar-warning" style="width: 20%"><span class="sr-only">20% Complete (warning)</span></div>
                    <div class="progress-bar progress-bar-danger" style="width: 10%"><span class="sr-only">10% Complete (danger)</span></div>
                  </div>
            </div>
       </div>
   </div>
   <div class="grid_3 grid_5">
     <h3 class="head-top">Alerts</h3>
     <div class="but_list">
       <div class="alert alert-success" role="alert">
        <strong>Well done!</strong> You successfully read this important alert message.
       </div>
       <div class="alert alert-info" role="alert">
        <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
       </div>
       <div class="alert alert-warning" role="alert">
        <strong>Warning!</strong> Best check yo self, you're not looking too good.
       </div>
       <div class="alert alert-danger" role="alert">
        <strong>Oh snap!</strong> Change a few things up and try submitting again.
       </div>
     </div>
   </div>
   <div class="grid_3 grid_5">
     <h3 class="head-top">Pagination</h3>
     <div class="col-md-6 page_1">
      <nav>
      <ul class="pagination pagination-lg">
        <li><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
      </ul>
      </nav>
      <nav>
      <ul class="pagination">
        <li><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
      </ul>
    </nav>
    <nav>
      <ul class="pagination pagination-sm">
        <li><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
      </ul>
    </nav>
    </div>
    <div class="col-md-6 page_1">
    	<ul class="pagination pagination-lg">
			<li class="disabled"><a href="#"><i class="fa fa-angle-left"></i></a></li>
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
	   </ul>
    <nav>
      <ul class="pagination">
        <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
     </ul>
   </nav>
     <ul class="pagination pagination-sm">
		<li class="disabled"><a href="#"><i class="fa fa-angle-left"></i></a></li>
		<li class="active"><a href="#">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#">4</a></li>
		<li><a href="#">5</a></li>
		<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
	</ul>
    </div>
   <div class="clearfix"> </div>
   </div>
   <div class="grid_3 grid_5">
     <h3 class="head-top">Breadcrumbs</h3>
     <div class="but_list">
	    <ol class="breadcrumb">
	      <li class="active">Home</li>
	    </ol>
	    <ol class="breadcrumb">
	      <li><a href="#">Home</a></li>
	      <li class="active">Library</li>
	    </ol>
	    <ol class="breadcrumb">
	      <li><a href="#">Home</a></li>
	      <li><a href="#">Library</a></li>
	      <li class="active">Data</li>
	    </ol>
	  </div>
   </div>
   <div class="grid_3 grid_5">
     <h3 class="head-top">Badges</h3>
       <div class="but_list">
	    <div class="col-md-6 page_1">
			<p>Add modifier classes to change the appearance of a badge.</p>
              <table class="table table-bordered">
				<thead>
					<tr>
						<th width="50%">Classes</th>
						<th width="50%">Badges</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>No modifiers</td>
						<td><span class="badge">42</span></td>
					</tr>
					<tr>
						<td><code>.badge-primary</code></td>
						<td><span class="badge badge-primary">1</span></td>
					</tr>
					<tr>
						<td><code>.badge-success</code></td>
						<td><span class="badge badge-success">22</span></td>
					</tr>
					<tr>
						<td><code>.badge-info</code></td>
						<td><span class="badge badge-info">30</span></td>
					</tr>
					<tr>
						<td><code>.badge-warning</code></td>
						<td><span class="badge badge-warning">412</span></td>
					</tr>
					<tr>
						<td><code>.badge-danger</code></td>
						<td><span class="badge badge-danger">999</span></td>
					</tr>
				</tbody>
			  </table>                    
		</div>
	
	
 	<!--//grid-->
		<!---->
<div class="copy">
            <p> &copy; 2016 Minimal. All Rights Reserved .</p>	    </div>
		</div>
		</div>
		<div class="clearfix"> </div>
       </div>
     
<!---->
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>

