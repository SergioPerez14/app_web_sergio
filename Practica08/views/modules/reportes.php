<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<br>

<h4>REPORTES</h4>

	<hr>
	<br>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>Matricula</th>
				<th>Nombre</th>
				<th>Carrera</th>
				<th>Tutor</th>
				<th>Editar</th>
				<th>Eliminar</th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			/*$vistaAlumno= new MvcController();
			$vistaAlumno -> vistaAlumnosController();
			$vistaAlumno -> borrarAlumnosController();
			*/
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




