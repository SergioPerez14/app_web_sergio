
	  <nav class="main-header navbar navbar-expand navbar-dark border-bottom" style="background-color: #954E9E">
	    <!-- Left navbar links -->
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
	      </li>
	      <li class="nav-item d-none d-sm-inline-block">
	        <a href="index.php?action=dashboard" class="nav-link">Inicio</a>
	      </li>
	    </ul>

	    <!-- SEARCH FORM -->
	    <form class="form-inline ml-3">
	      <div class="input-group input-group-sm">
	        <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">
	        <div class="input-group-append">
	          <button class="btn btn-navbar" type="submit">
	            <i class="fa fa-search"></i>
	          </button>
	        </div>
	      </div>
	    </form>

	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="index.php?action=help"><i class="fa fa-question-circle"></i></a>
	      </li>				      
	    </ul>

	  </nav>
	  <!-- /.navbar -->

	  <!-- Main Sidebar Container -->
	  <aside class="main-sidebar sidebar-dark-primary elevation-4">
	    <!-- Brand Logo -->
	    <a href="index.php?action=dashboard" class="brand-link" style="background-color: #954E9E">
	      <img src="views/dist/img/he.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-6" style="opacity: .8">
	      <center><span class="brand-text font-weight-light">Bienvenidos a Danzlife</span></center>
	    </a>

	    <!-- Sidebar -->
	    <div class="sidebar">
	      <!-- Sidebar user panel (optional) -->
	      <div class="user-panel mt-1 pb-3 mb-3"><br>
			<img src="views/dist/img/he2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-6" style="opacity: .8">
	        <div class="info" >
	          <a href="" class="d-block">Sistema de Pagos</a>
	          <!--<a href="" class="d-block">ID USER: '.$_SESSION["id_usuario"].'</a>
	          <a href="" class="d-block">USERNAME: '.$_SESSION["username"].'</a>-->
	        </div>
	      </div>

	      <!-- Sidebar Menu -->
	      <nav class="mt-2">
	        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
	          <!-- Add icons to the links using the .nav-icon class
	               with font-awesome or any other icon font library -->         

	          <li class="nav-item">
	            <a href="index.php" class="nav-link">
	              <i class="nav-icon fa fa-credit-card"></i>
	              <p>
	                Pagos - Lugares
	              </p>
	            </a>
	          </li>
	          <li class="nav-item">
	            <a href="index.php?action=registrarPago2" class="nav-link">
	              <i class="nav-icon fa fa-plus-circle"></i>
	              <p>
	                Nuevo Pago
	              </p>
	            </a>
	          </li>	          
	        </ul>
	      </nav>
	      <!-- /.sidebar-menu -->
	    </div>
	    <!-- /.sidebar -->
		</aside>

		<!DOCTYPE html>
		<html>
		<head>
		  <meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <title>Pagos | Vista Pagos</title>

		</head>
		<body class="hold-transition sidebar-mini">
		<div class="wrapper">

		  <!-- Content Wrapper. Contains page content -->
		  <div class="content-wrapper">
		    <!-- Content Header (Page header) -->
		    <section class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1>Pagos</h1>
		          </div>
		          <div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a></li>
		              <li class="breadcrumb-item active">Pagos</li>
		            </ol>
		          </div>
		        </div>
		      </div><!-- /.container-fluid -->
		    </section>

		    <!-- Main content -->
		    <section class="content">
		      <div class="row">
		        <div class="col-12">
		          <div class="card">
		            <div class="card-header">
		              <div class="float-left">
		                <!--<a ><input class="btn btn-block btn-success" value="Nuevo Usuario"></a>-->
		                  <a href="index.php?action=registrarPago2" class="btn btn-success" title= "Agregar Pago">
		                      <i class="fa fa-plus"></i>
		                        Nuevo Pago
		                  </a>
		              </div>
		            </div>
		            <!-- /.card-header -->
		            <div class="card-body">
		              <table id="example1" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                	<th>Lugar</th>
          					<th>ID Pago</th>
							<th>Nombre Alumna</th>
           		        	<th>Grupo</th>
							<th>Nombre Mama</th>
					        <th>Fecha Pago</th>
					        <th>Fecha Envio</th>
		                  	<th>Folio</th>
							<!--<th>Eliminar</th>-->
		                </tr>
		                </thead>
		                <tbody>
		            			<?php
		                  			//Vista completa de los usuarios mediante un datatable
		              				$vistaPagos= new MvcController();
	        						$vistaPagos -> vistaPPago2Controller();
	        						//$vistaPagos -> borrarPagosController();
		      					?>
		                </tbody>
		                <tfoot>
		                <tr>
		                	<th>Lugar</th>
					        <th>ID Pago</th>
					        <th>Nombre Alumna</th>
					        <th>Grupo</th>
					        <th>Nombre Mama</th>
					        <th>Fecha Pago</th>
					        <th>Fecha Envio</th>
			                <th>Folio</th>
							<!--<th>Eliminar</th>-->
		                </tr>
		                </tfoot>
		              </table>
		            </div>
		            <!-- /.card-body -->
		          </div>
		          <!-- /.card -->
		        </div>
		        <!-- /.col -->
		      </div>
		      <!-- /.row -->
		    </section>
		    <!-- /.content -->
		  </div>
		  <!-- /.content-wrapper -->
		  <footer class="main-footer">
		    <div class="float-right d-none d-sm-block">
		      <b>Version</b> 3.0.0-alpha
		    </div>
		    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
		    reserved.
		  </footer>

		  <!-- Control Sidebar -->
		  <aside class="control-sidebar control-sidebar-dark">
		    <!-- Control sidebar content goes here -->
		  </aside>
		  <!-- /.control-sidebar -->
		</div>
		<!-- ./wrapper -->

		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

		<!-- page script -->
		<script>
		  $(function () {
		    $('#example1').DataTable( {
		        dom: 'Bfrtip',
		        buttons: [
		            'copy', 'csv', 'excel', 'pdf', 'print'
		        ]
		    } );
		  });
		</script>
		</body>
		</html>


<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
/*$registro = new MvcController();
//se invoca la función registroUsuarioController de la clase MvcController:
$registro -> registroUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

} -->
*/
?>
