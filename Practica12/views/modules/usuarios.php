<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<br>

<h4>LISTADO USUARIOS</h4>

	<hr>
	<br>
	<input type="button" style="left: -200px" class="button radius tiny success" value="Nuevo Usuario" onclick="window.location= 'index.php?action=registrarUsuario' ">

	<br>

	<!-- Tabla con el listado de alumnos -->
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
			$vistaUsuario= new MvcController();
			$vistaUsuario -> vistaUsuariosController();
			$vistaUsuario -> borrarUsuarioController();

			?>

		</tbody>

	</table>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "AlumnoEditado"){

		//echo "Cambio Exitoso";
	
	}

}

?>




