<?php

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

	$editarTutorias = new MvcControllerTutorias();
	$editarTutorias -> editarTutoriaController();
	$editarTutorias -> actualizarTutoriaController();

	?>

</form>



