<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<br>

<h4>EDITAR ALUMNO</h4>

<hr><br>

<strong><h4>Información General</h4></strong>

<br>

<form method="post">
	
	<?php

	$editarAlumnos = new MvcController();
	$editarAlumnos -> editarAlumnosController();
	$editarAlumnos -> actualizarAlumnosController();

	?>

</form>




