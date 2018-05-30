<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<br>
<!-- Datatables de las tablas de la db -->
<h4>REPORTES</h4>

	<hr>
	<br>

	<strong><h4>Alumnos</h4></strong>
	<br>

	<!-- Datatables de alumnos -->
	<table border="1" name="example" id="example" class="display">
		
		<thead>
			
			<tr>
				<th>Matricula</th>
				<th>Nombre</th>
				<th>Carrera</th>
				<th>Tutor</th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaAlumno= new MvcController();
			$vistaAlumno -> vistaReportesAlumnosController();
		
			?>

		</tbody>

	</table>

	<br>

	<hr><br>
	<strong><h4>Maestros</h4></strong>
	<br>

	<!-- Datatables de maestros -->
	<table border="1" name="example2" id="example2" class="display">
		
		<thead>
			
			<tr>
				<th>No. Empleado</th>
				<th>Nombre</th>
				<th>Carrera</th>
				<th>Email</th>
				<th>Passowrd</th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaMaestro = new MvcControllerMaestros();
			$vistaMaestro -> vistaReportesMaestrosController();
		
			?>

		</tbody>

	</table>

	<br>

	<hr><br>
	<strong><h4>Carreras</h4></strong>
	<br>

	<!-- Datatables de Carreras -->
	<table border="1" name="example3" id="example3" class="display">
		
		<thead>
			
			<tr>
				<th>ID</th>
				<th>Nombre</th>
			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaCarrera = new MvcControllerCarreras();
			$vistaCarrera -> vistaReportesCarreraController();
		
			?>

		</tbody>

	</table>

	<br>

	<hr><br>
	<strong><h4>Tutorias</h4></strong>
	<br>

	<!-- Datatables de Tutorias -->
	<table border="1" name="example4" id="example4" class="display">
		
		<thead>
			
			<tr>
				<th>Matricula</th>
				<th>Tutor</th>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Tipo</th>
				<th>Tema</th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaTutorias = new MvcControllerTutorias();
			$vistaTutorias -> vistaReportesTutoriasController();
		
			?>

		</tbody>

	</table>

<?php


?>




