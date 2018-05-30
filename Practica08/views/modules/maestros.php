<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>
<br>
<h4>LISTADO MAESTROS</h4>

	<hr>
	<br>

	<input type="button" style="left: -200px" class="button radius tiny success" value="Nuevo Maestro" onclick="window.location= 'index.php?action=registrarmaestros' ">

	<br><br>
	<!-- Tabal del listado de maestros -->
	<table border="1">
		
		<thead>
			
			<tr>
				<th>No. Empleado</th>
				<th>Nombre</th>
				<th>Carrera</th>
				<th>Email</th>
				<th>Passowrd</th>
				<th>Editar</th>
				<th>Eliminar</th>

			</tr>

		</thead>

		<tbody>
			
			<?php
			//Se manda llamar al controlador de maestros, donde se manda llamar a la vista de maestros y a borrar maestros
			$vistaMaestro= new MvcControllerMaestros();
			$vistaMaestro -> vistaMaestrosController();
			$vistaMaestro -> borrarMaestrosController();

			?>

		</tbody>

	</table>

<?php

//Se valida que si action recibe el valor MaestroEditado se redirija a esa pagina
if(isset($_GET["action"])){

	if($_GET["action"] == "MaestroEditado"){

		//echo "Cambio Exitoso";
	
	}

}

?>




