<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<br>

<h4>REGISTRO DE ALUMNOS</h4>

	<hr><br>

		<input type="button" style="left: -200px;" class="button radius tiny" value="Listado Alumnos" onclick="window.location= 'index.php?action=alumnos' ">

	<br>

	<strong><h4>Información General</h4></strong>

	<br>

	<form method="post">
		
		<input type="text" placeholder="Matricula" name="matricula" required>

		<input type="text" placeholder="Nombre" name="nombre" required>
		
		<input type="text" placeholder="Carrera" name="carrera" required>
			
		<input type="text" placeholder="Tutor" name="tutor" required>

		<input type="submit" class="button radius tiny" style="background-color: #360956; left: -1px; width: 400px; value="Enviar">

	</form>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcController();
//se invoca la función registroProductosController de la clase MvcController:
$registro -> registroAlumnoController();

if(isset($_GET["action"])){

	if($_GET["action"] == "AlumnoRegistrado"){

		//echo "Producto Añadido";
	
	}

}

?>
