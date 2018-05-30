<?php

//Validacion de sesion para no ingresar a una seccion sin antes estar logeado
session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<br>

<h4>EDITAR MAESTRO</h4>

<hr><br>

<strong><h4>Información General</h4></strong>

<br>

<form method="post">
	
	<?php
	//Se llama al controlador de maestros para editar o actualizar
	$editarMaestros = new MvcControllerMaestros();
	$editarMaestros -> editarMaestrosController();
	$editarMaestros -> actualizarMaestrosController();

	?>

</form>



