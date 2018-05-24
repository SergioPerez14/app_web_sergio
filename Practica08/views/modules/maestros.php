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

			$vistaMaestro= new MvcControllerMaestros();
			$vistaMaestro -> vistaMaestrosController();
			$vistaMaestro -> borrarMaestrosController();

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




