	<!DOCTYPE html>
	<html>
	  <head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <title>LogUCAB</title>

	    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon2.ico')}}">

  </head>
<body class="hold-transition skin-purple  sidebar-mini " >
	    <div class="wrapper">

      <header class="main-header">

	        <!-- Logo -->
	        <a href="index2.html" class="logo" style='height: 69px'>
	          <!-- mini logo for sidebar mini 50x50 pixels -->
	          	<span class="logo-mini"><b>UCA</b>B</span>
	          <!-- logo for regular state and mobile devices -->
	          	<span class="logo-lg"> <div align="center"><IMG src="{{asset('img/Logo.png')}}" width="80px" height="70px"></div></span>
	    	</a>

	        <!-- Header Navbar: style can be found in header.less -->
	        <nav class="navbar navbar-static-top" role="navigation" style='height: 69px' >
	          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" >
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu" >
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs"> Usuario</span>
                </a>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" >
	      	   <style type="">
	      		  .main-sidebar {	
   				  left: 0; 
				  top: 0; 
	              position: fixed; }
	      	   </style>

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
 <ul class="sidebar-menu">

	            <li class="header"></li>
	            
	            <li class="treeview">
	              <a href="#">
	                <i class="fa fa-truck" aria-hidden="true"></i>
	                <span>Transportes</span>
	                <i class="fa fa-angle-left pull-right"></i>
	              </a>
	              <ul class="treeview-menu">
	                <li><a href="transportes/nacionales"><i class="fa fa-circle-o"></i> Nacionales</a></li>
	              </ul>
	            </li>
	            
	            <li class="treeview">
	              <a href="#">
	                <i class="fa fa-hand-o-right" aria-hidden="true"></i>
	                <span>Sugerencia de envíos</span>
	                <small class="label pull-right bg-red">PDF</small>
	                 <i class="fa fa-angle-left pull-right"></i>
	              </a>
	             
	            </li>
	            <li>
	              <a href="#">
	                <i class="fa fa-envelope" aria-hidden="true"></i>
	                <span>Realizar envío</span>
	              </a>
	            </li>
	            <li>
	              <a href="#">
	                <i class="fa fa-map-o" aria-hidden="true"></i>
	                <span>Rastreo de paquete</span>
	              </a>
	            </li>
	           <li class="treeview">
	              <a href="#">
	                <i class="fa fa-black-tie" aria-hidden="true"></i>
	                <span>Empleados</span>
	              <i class="fa fa-angle-left pull-right"></i>
	              </a>
 				<ul class="treeview-menu">
	                <li><a href="empleados/lista"><i class="fa fa-circle-o"></i>Lista</a></li>
	                <li><a href="empleados/salarios"><i class="fa fa-circle-o"></i>Salarios</a></li>
	              </ul>
	            </li>

	           <li class="treeview">
	              <a href="#">
	                <i class="fa fa-users" aria-hidden="true"></i>
	                <span>Clientes</span>
	              <i class="fa fa-angle-left pull-right"></i>
	              </a>
 				<ul class="treeview-menu">
	                <li><a href="cliente/lista"><i class="fa fa-circle-o"></i>Lista</a></li>
	            </ul>
	          </li>
				<li class="treeview">
	              <a href="#">
	                <i class="fa fa-bell" aria-hidden="true"></i>
	                <span>Servicios</span>
	              <i class="fa fa-angle-left pull-right"></i>
	              </a>
 				<ul class="treeview-menu">
	                <li><a href="servicios/basicos"><i class="fa fa-circle-o"></i>Básicos</a></li>
	                <li><a href="servicios/proveedores"><i class="fa fa-circle-o"></i>Proveedores</a></li>
	              </ul>
	            </li>	            
	           <li class="treeview">
	              <a href="#">
	                <i class="fa fa-building" aria-hidden="true"></i>
	                <span>Sucursales</span>
	              <i class="fa fa-angle-left pull-right"></i>
	              </a>
 				<ul class="treeview-menu">
	                <li><a href="sucursales/ver"><i class="fa fa-circle-o"></i>Ver</a></li>
	                <li><a href="sucursales/informacion"><i class="fa fa-circle-o"></i>Informacion</a></li>
	              </ul>
	            </li>
	            <li>
	              <a href="#">
	                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i><span>Reclamos</span>
	              </a>
	            </li>
	            <li>
	            <li>
	              <a href="#">
	                <i class="fa fa-phone" aria-hidden="true"></i><span>Contactenos</span>
	              </a>
	            </li>
	            <li>
	              <a href="#">
	                <i class="fa fa-info-circle"></i> <span>Nosotros</span>
	                <small class="label pull-right bg-yellow">LogUCAB</small>
	              </a>
	            </li>
	                        
	          </ul>
	        </section>
	        <!-- /.sidebar -->
	      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de envíos</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              @yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
	       <footer class="main-footer">
	       	<center>
	          <strong>© 2018 LogUCAB.com 
	        	<a href="www.incanatoit.com">- Todos los derechos reservados.</a>
	        	 <a href="www.incanatoit.com">- Términos y condiciones 
	        	 	<a href="www.incanatoit.com">-Política de privacidad </strong> 
	        </center>
	      </footer>

      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
  </body>
</html>
