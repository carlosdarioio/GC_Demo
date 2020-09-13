<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>carlosdarioio</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />    
    <link href="dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
    <script src="plugins/jquery/jquery-2.1.4.min.js"></script>
    <script src="plugins/morris/raphael-min.js"></script>
    <script src="plugins/morris/morris.js"></script>
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <link rel="stylesheet" href="plugins/morris/example.css">

    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<link href='plugins/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='plugins/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />


<script src='plugins/fullcalendar/moment.min.js'></script>
<script src='plugins/fullcalendar/fullcalendar.min.js'></script>
<link rel="stylesheet" type="text/css" href="plugins/pickadate/themes/classic.css">
<link rel="stylesheet" type="text/css" href="plugins/pickadate/themes/classic.date.css">
<link rel="stylesheet" type="text/css" href="plugins/pickadate/themes/classic.time.css">
<script src='plugins/pickadate/picker.js'></script>
<script src='plugins/pickadate/picker.date.js'></script>
<script src='plugins/pickadate/picker.time.js'></script>
<link href='plugins/css.css' rel='stylesheet' media='print' />
<link rel="shortcut icon" href="/Soporte/core/app/layouts/favicon.ico" />
  </head>
  <body class="<?php if(isset($_SESSION["user_id"])  ):?>  skin-blue sidebar-mini sidebar-collapse<?php else:?>login-page<?php endif; ?>" >
  <?php 
  if(isset($_SESSION["user_id"])  ):
  $Usuario=UserData::getById($_SESSION["user_id"]);  
  endif;
  ?>
    <?php date_default_timezone_set('America/Mexico_City'); ?>
	<div class="wrapper">
      <!-- Main Header -->
      <?php if(isset($_SESSION["user_id"])):?>
      <header class="main-header">
        <!-- Logo -->
		
        <a href="./" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>DM</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Demo</b></span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="">
				  <?php 
					if(isset($_SESSION["user_id"])){ echo $Usuario->name; }
                  ?>
				  </span>
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-footer">
                    <div class="pull-right">                      
					  <a href="index.php?view=edituser&id=<?php echo $_SESSION["user_id"];?>" class="btn btn-default btn-flat">Editar</a>
					  <br><br>
					  <a href="./logout.php" class="btn btn-default btn-flat">Salir</a>
					  
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <ul class="sidebar-menu">		  		  
            <?php if(isset($_SESSION["user_id"])):
			//cerrando sesion en caso de que no la hay acerrado como anonimo			
			 if(isset($_GET["Note"])):
				if($_GET["Note"]=="Anonimo"):
					print "<script>window.location='./logout.php?RPTWW=Reporte';</script>";		  
				endif;
			endif;
			?>			

            <?php $u = $Usuario; ?>
			<li><a href="./index.php?view=home"><i class='fa fa-dashboard'></i> <span>Inicio</span></a></li>												
			<?php if($u->kind==1):?>			
			<li><a href="./?view=NewGR"><i class='fa fa-shopping-cart'></i> <span>Compras y Gastos</span></a></li>
			<li><a href="./?view=newvta"><i class='fa fa-book'></i> <span>Ventas</span></a></li>
			<li><a href="./?view=gastos"><i class='fa fa-indent'></i> <span>Clasificacion de Gastos</span></a></li>
			<li><a href="./?view=proveedor"><i class='fa fa-truck'></i> <span>Proveedores</span></a></li>
			<li><a href="./?view=pagos"><i class='fa fa-cc'></i> <span>Pagos</span></a></li>
			<li><a href="./?view=users"><i class='fa fa-user'></i> <span>Usuarios</span></a></li>
			<li><a href="./?view=almacenes"><i class='fa fa-circle '></i> <span>Almacenes</span></a></li>
			<?php endif;?>
			
			<!--Menu Compras y Gastos----------------------------->
			<?php if($u->kind==2):?>
			<li><a href="./?view=NewGR"><i class='fa fa-shopping-cart'></i> <span>Compras y Gastos</span></a></li>
			<li><a href="./?view=gastos"><i class='fa fa-indent'></i> <span>Clasificacion de Gastos</span></a></li>
			<li><a href="./?view=proveedor"><i class='fa fa-truck'></i> <span>Proveedores</span></a></li>
			<li><a href="./?view=pagos"><i class='fa fa-cc'></i> <span>Pagos</span></a></li>
			
			
			<?php endif;?>
			 <!--Fin Cambiando Tipos de sols--------------------------->
			 
			 <!--Menu Ventas----------------------------->
			<?php if($u->kind==3):?>
			
			<li><a href="./?view=newvta"><i class='fa fa-book'></i> <span>Ventas</span></a></li>
			<li><a href="./?view=almacenes"><i class='fa fa-circle'></i> <span>Almacenes</span></a></li>
			<?php endif;?>
			 <!--Fin Ventas--------------------------->
			
          
            
            <?php endif; ?>			
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
    <?php endif;?>

      <!-- Content Wrapper. Contains page content -->
      <?php if(isset($_SESSION["user_id"]) ):?>
      <div class="content-wrapper">
      <div class="content">
        <?php View::load("index");?>
        </div>	
      </div><!-- /.content-wrapper -->
        <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2020 <a href="https://github.com/carlosdarioio" >carlosdarioio</a></strong>
      </footer>
		 <?php else:?>
		
		<div class="login-box">
      <div class="login-logo ">
        <a href="./"><b>Prueba de Aptitud y Habilidades</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body logg">
        <form action="./?action=processlogin" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" required class="form-control" placeholder="Usuario"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" required class="form-control" placeholder="contra"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">

            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>              
			  <br>
			  <p class ="lead">Comparto lista de usuarios:</p>
			  <h2>Administrador:</h2>
			  <p>Usuario: admin</p>
			  <p>Contraseña: admin</p>
			  <h2>Gastos y Compras:</h2>
			  <p>Usuario: GC</p>
			  <p>Contraseña: GC</p>
			  <h2>Ventas:</h2>
			  <p>Usuario: Ventas</p>
			  <p>Contraseña: Ventas</p>
			  
			  <br>
			  <input type="hidden" id="viw" name="viw" value="<?php if(isset($_GET["view"])){echo $_GET["view"]; }?>">
			  <input type="hidden" id="idd" name="idd" value="<?php if(isset($_GET["id"])){echo $_GET["id"]; }?>">
			 
		</div>
          </div>
        </form>
      </div>
    </div><?php endif;?>

	
	
 
    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    </div><!-- ./wrapper -->

    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".pickadate").pickadate({format: 'yyyy-mm-dd',min: '<?php echo date('Y-m-d',time()-(24*60*60)); ?>'});
        $(".pickatime").pickatime({format: 'HH:i',interval: 10 });
      })
    </script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".datatable").DataTable({
          "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
        });
      });
    </script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->  		  
		  
		      <!--Google Analityc -->
<script>
	(function (i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
			(i[r].q = i[r].q || []).push(arguments)
		}, i[r].l = 1 * new Date(); a = s.createElement(o),
		m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
	})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
	ga('create', 'UA-99123445-1', 'auto');
	ga('send', 'pageview');
</script>

<!-- Fin Google Analaityc-->
  </body>
</html>

