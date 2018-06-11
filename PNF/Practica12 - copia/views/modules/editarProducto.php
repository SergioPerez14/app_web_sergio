<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<br>

<h4>EDITAR USUARIO</h4>

<hr><br>

<strong><h4>Información General</h4></strong>

<br>

<form method="post">
	
	<?php
	//Se requiere del controlador MvcController, ademas de editarAlumnosController y actualizarAlumnosController
	$editarProducto = new MvcController();
	$editarProducto -> editarProductoController();
	$editarProducto -> actualizarProductoController();

	?>

</form>




