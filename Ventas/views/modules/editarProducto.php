<?php
//Verifica la sesion
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
  <title>Productos | Editar Productos</title>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<!-- Formulario para la insercion de Alumnos -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Producto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Editar Producto</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
		    <section class="content">
		      	<div class="container-fluid">
		        	<div class="row">
		          		<!-- left column -->
		          		<div class="col-md-12">
		            		<!-- general form elements -->
		            		<div class="card card-info">
		             		 	<div class="card-header" style="background-color: #05758c">
			              			<div class="float-right">
			                			<a href="index.php?action=productos"><input class="btn btn-block btn-outline-warning" value="Listado de Productos"></a>
			              			</div>
  		                			<h3 class="card-title">Información General</h3>
		              			</div>
		              			<!-- /.card-header -->
		              			<!-- form start -->
				            	<form method="post">
				            			<?php
				            				//Para editar un producto
											//Se requiere del controlador MvcController, ademas de editarProductoController y actualizarProductoController
											$editarProducto = new MvcController();
											$editarProducto -> editarProductoController();
											$editarProducto -> actualizarProductoController();
										?>
			              		</form>
		            		</div>
		            		<!-- /.card -->
				  		</div>
					</div>
			  	</div>
			</section>
		</div>
	</div>
</body>
</html>




