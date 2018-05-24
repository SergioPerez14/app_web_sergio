<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>
<br>
<h4>LISTADO CARRERAS</h4>

	<hr>
	<br>

	<input type="button" style="left: -200px" class="button radius tiny success" value="Nueva Carrera" onclick="window.location= 'index.php?action=registrarcarreras' ">

	<br><br>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Editar</th>
				<th>Eliminar</th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaCarrera = new MvcControllerCarreras();
			$vistaCarrera -> vistaCarrerasController();
			$vistaCarrera -> borrarCarrerasController();

			?>

		</tbody>

	</table>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "MaestroEditado"){

		//echo "Cambio Exitoso";
	
	}

}

?>




