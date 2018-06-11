<?php
//verifica sesion
session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<!--<br>

<h4>LISTADO PRODUCTOS</h4>

	<hr>
	<br>
	<input type="button" style="left: -200px" class="button radius tiny success" value="Nuevo Producto" onclick="window.location= 'index.php?action=registrarProducto' ">

	<br>

	<!-- Tabla con el listado de alumnos
	<table border="1">
		
		<thead>
			
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Cantidad</th>
				<th>Precio Unitario</th>
				<th>Editar</th>
				<th>Eliminar</th>

			</tr>

		</thead>

		<tbody>
			
			<?php
			//Se manda al controler MvcController y llama a vistaAlumnosController y borrarAlumnosController
			//$vistaProducto = new MvcController();
			//$vistaProducto -> vistaProductosController();
			//$vistaProducto -> borrarProductoController();

			?>

		</tbody>

	</table>-->


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
            <h1>Productos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Productos</li>
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
                <!--<a href="index.php?action=registrarProducto"><input class="btn btn-block btn-success" value="Nuevo Producto"></a>-->
                  <a href="index.php?action=registrarProducto" class="btn btn-success" title= "Agregar Producto">
                      <i class="fa fa-plus-circle"></i>
                        Nuevo Producto
                  </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>ID</th>
          <th>Codigo Producto</th>
					<th>Nombre</th>
					<th>Fecha</th>
					<th>Precio</th>
					<th>Stock</th>
          <th>Categoria</th>
          <th>Operaciones</th>
					<th>Acciones</th>
					<!--<th>Eliminar</th>-->
                </tr>
                </thead>
                <tbody>
            			<?php
                  //Vista completa de los productos registrados, mediante un datatable
        							$vistaProducto = new MvcController();
        							$vistaProducto -> vistaProductosController();
        							$vistaProducto -> borrarProductoController();
						      ?>
                </tbody>
                <tfoot>
                <tr>
          <th>ID</th>
          <th>Codigo Producto</th>
          <th>Nombre</th>
          <th>Fecha</th>
          <th>Precio</th>
          <th>Stock</th>
          <th>Categoria</th>
          <th>Operaciones</th>
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


<?php




if(isset($_GET["action"])){

	if($_GET["action"] == "ProductoEditado"){

		//echo "Cambio Exitoso";
	
	}

}

?>
