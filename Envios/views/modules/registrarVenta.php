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
  <title>Ventas | Registrar Ventas</title>

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
            <h1>Registrar Venta</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Registrar Venta</li>
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
			                			<a href="index.php?action=ventas"><input class="btn btn-block btn-outline-warning" value="Listado de Ventas"></a>
			              			</div>
  		                			<h3 class="card-title">Información General</h3>
		              			</div>
		              			<!-- /.card-header -->
				            	<form method="post">
								  		<div class="card-body">
							    		<div class="row">
							      			<div class="col-md-6">
								                <div class="form-group">
									                <label for="exampleInputEmail1">Producto</label>
													<select class="form-control select2" type="number" name="idProductoVenta" style="width: 100%;">
														<?php									
															$selectProd = new MvcController();
															$selectProd -> SeleccionarProductosController();	
														?>
										           </select>
								                </div>
								                <div class="form-group">
									                <label for="exampleInputEmail1">Fecha de Venta</label>
									                <input type="date" class="form-control" name="fechaVentaEditar">
								                </div>
							      			</div>

							      			<div class="col-md-6">
								                <div class="form-group">
									                <label for="exampleInputEmail1">Cantidad</label>
									                <input type="number" class="form-control" value="" name="cantidadVenta" min=1>
								                </div>	                
							      			</div>
							      			<!-- /.col -->
							    		</div>
							    		<!-- /.row -->
							  		</div>
									<!-- /.card-body -->
									<div class="card-body">
							    		<div class="row">
							            	<div class="col-md-3">
							              		<div></div>
							              	</div>
							          			<div class="col-md-6">
							      				<div class="card-footer">
							          			<input type="submit" class="btn btn-block" style="background-color: #dd7d00; color: white;" name="enviar" value="Finalizar Venta">
							        			</div>
							      			</div>
							      			<div class="col-md-3">
							      				<div></div>
							      			</div>
							   			</div>
										</div>
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
	<!--<form method="post">

		<label>Nombre: </label>
		<input type="text" placeholder="Nombre" name="nombre" required>
		
		<label>Username: </label>
		<input type="text" placeholder="Username" name="username" required>

		<label>Contraseña: </label>			
		<input type="text" placeholder="Contraseña" name="password" required>

		<input type="submit" class="button radius tiny" name="enviar" style="background-color: #360956; left: -1px; width: 400px;" value="Enviar">

	</form>-->

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcController();
//se invoca la función registroUsuarioController de la clase MvcController:
$registro -> registrarVentaController();

if(isset($_GET["action"])){

	if($_GET["action"] == "UsuarioRegistrado"){

		//echo "Producto Añadido";
	
	}

}

?>
