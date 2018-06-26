<?php
//Verifica sesion
session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Historial | Vista Historial</title>

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
            <h1>Historial</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Historial</li>
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
                <h3>Movimientos Realizados</h3>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>ID</th>
					<th>ID Producto</th>
					<th>ID Usuario</th>
					<th>Fecha</th>
          <th>Nota</th>
          <th>Referencia</th>
          <th>Cantidad</th>
					<!--<th>Acciones</th>
					<th>Eliminar</th>-->
                </tr>
                </thead>
                <tbody>
            			<?php
                    //Vista de los movimientos hechos en cuanto a stock de productos mediante un datatable
                			$vistaHistorial = new MvcController();
    						      $vistaHistorial -> vistaMovimientosController();
    						      $vistaHistorial -> borrarMovimientoController();
						      ?>
                </tbody>
                <tfoot>
                <tr>
          <th>ID</th>
          <th>ID Producto</th>
          <th>ID Usuario</th>
          <th>Fecha</th>
          <th>Nota</th>
          <th>Referencia</th>
          <th>Cantidad</th>
          <!--<th>Acciones</th>
					<th>Eliminar</th>-->
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

<!-- page script -->
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


<!--<br>

<h4>LISTADO USUARIOS</h4>

	<hr>
	<br>
	<input type="button" style="left: -200px" class="button radius tiny success" value="Nuevo Usuario" onclick="window.location= 'index.php?action=registrarUsuario' ">

	<br>

	<!-- Tabla con el listado de alumnos
	<table border="1">
		
		<thead>
			
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Username</th>
				<th>Password</th>
				<th>Editar</th>
				<th>Eliminar</th>

			</tr>

		</thead>

		<tbody>
			
			<?php
			//Se manda al controler MvcController y llama a vistaAlumnosController y borrarAlumnosController
			//$vistaUsuario= new MvcController();
			//$vistaUsuario -> vistaUsuariosController();
			//$vistaUsuario -> borrarUsuarioController();

			?>

		</tbody>

	</table>-->

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "AlumnoEditado"){

		//echo "Cambio Exitoso";
	
	}

}

?>




