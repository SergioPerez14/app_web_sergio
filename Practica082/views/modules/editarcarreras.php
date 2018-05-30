<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<br>

<h4>EDITAR CARRERA</h4>

<hr><br>

<br>

<form method="post">
	
	<?php

	$editarCarrera = new MvcControllerCarreras();
	$editarCarrera -> editarCarreraController();
	$editarCarrera -> actualizarCarreraController();

	?>

</form>



