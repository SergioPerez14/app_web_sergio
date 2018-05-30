<?php

//Validacion de sesion para no ingresar a una seccion sin antes estar logeado
session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<br>

<h4>EDITAR TUTORIA</h4>

<hr><br>

<strong><h4>Información General</h4></strong>

<br>


<form method="post">
	
	<?php
	//Se llama al controlador de tutorias, ademas se llama a editar y actualizar tutoria
	$editarTutorias = new MvcControllerTutorias();
	$editarTutorias -> editarTutoriaController();
	$editarTutorias -> actualizarTutoriaController();

	?>

</form>



