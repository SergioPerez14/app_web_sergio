<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<br>

<h4>LISTADO PRODUCTOS</h4>

	<hr>
	<br>
	<input type="button" style="left: -200px" class="button radius tiny success" value="Nuevo Producto" onclick="window.location= 'index.php?action=registrarProducto' ">

	<br>

	<!-- Tabla con el listado de alumnos -->
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
			$vistaProducto = new MvcController();
			$vistaProducto -> vistaProductosController();
			$vistaProducto -> borrarProductoController();

			?>

		</tbody>

	</table>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "ProductoEditado"){

		//echo "Cambio Exitoso";
	
	}

}

?>
