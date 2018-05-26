<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<br>

<h4>REGISTRO DE TUTORIAS</h4>

	<hr><br>

		<input type="button" style="left: -200px;" class="button radius tiny" value="Listado Tutorias" onclick="window.location= 'index.php?action=tutorias' ">

	<br>

	<strong><h4>Información General</h4></strong>

	<br>

	<form method="post">
		
		<input type="text" placeholder="Matricula" name="alumno" required>

		<input type="text" placeholder="Tutor" name="tutor" required>

		<input type="text" placeholder="Fecha - Formato: YYYY-MM-DD" name="fecha" required>

		<input type="text" placeholder="Hora - Formato: 00:00" name="hora" required>

		<input type="text" placeholder="Tipo" name="tipo" required>

		<input type="text" placeholder="Tema" name="tema" required>

		<input type="submit" class="button radius tiny" style="background-color: #360956; left: -1px; width: 400px; value="Enviar">

	</form>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcControllerTutorias();
//se invoca la función registroProductosController de la clase MvcController:
$registro -> registroTutoriasController();

if(isset($_GET["action"])){

	if($_GET["action"] == "TutoriaRegistrada"){

		//echo "Producto Añadido";
	
	}

}

?>
