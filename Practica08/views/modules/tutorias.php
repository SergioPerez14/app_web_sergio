<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<br>
<!-- Listado de tutorias -->
<h4>LISTADO TUTORIAS</h4>

	<hr>
	<br>
	<input type="button" style="left: -200px" class="button radius tiny success" value="Nueva Tutoria" onclick="window.location= 'index.php?action=registrartutorias' ">

	<br>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>Matricula</th>
				<th>Tutor</th>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Tipo</th>
				<th>Tema</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>

		</thead>

		<tbody>
			
			<?php
			//Se manda al controlador MvcControllerTutorias donde se encuentran vistaTutoriasController y borrarTutoriasController
			$vistaTutorias= new MvcControllerTutorias();
			$vistaTutorias -> vistaTutoriasController();
			$vistaTutorias -> borrarTutoriasController();

			?>

		</tbody>

	</table>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "TutoriaEditada"){

		//echo "Cambio Exitoso";
	
	}

}

?>




