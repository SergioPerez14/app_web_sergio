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
  <title>AdminLTE 3 | Data Tables</title>

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
            <h1>Ventas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Ventas</li>
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
                  <a href="index.php?action=registrarVenta" class="btn btn-success" title= "Nueva Venta">
                      <i class="fa fa-user-plus"></i>
                        Nueva Venta
                  </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>ID</th>
					<th>Fecha</th>
					<th>Total</th>
					<th>Acciones</th>
					<!--<th>Eliminar</th>-->
                </tr>
                </thead>
                <tbody>
            			<?php
                  //Vista completa de los usuarios mediante un datatable
                    if(isset($_POST['data'])){
                      require_once "../../models/enlaces.php";
                      require_once "../../models/crud.php";
                      require_once "../../controllers/controller.php";
                      $verificar = new MvcController();
                      echo($verificar -> insertSale($_POST['data']));
                      //var_dump($_POST['data']);

                    }
              			$vistaVenta = new MvcController();
        						$vistaVenta -> vistaVentasController();
        						//$vistaUsuario -> borrarUsuarioController();
      						?>
                </tbody>
                <tfoot>
                <tr>
          <th>ID</th>
          <th>Fecha</th>
          <th>Total</th>
          <th>Acciones</th>
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

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
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




