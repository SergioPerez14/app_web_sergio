<?php

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

	$editarMaestros = new MvcControllerMaestros();
	$editarMaestros -> editarMaestrosController();
	$editarMaestros -> actualizarMaestrosController();

	?>

</form>



