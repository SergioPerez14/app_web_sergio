<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>REGISTRO DE ALUMNOS</h1>

	<hr>

	<input type="button" value="Listado Alumnos" onclick="window.location= 'index.php?action=alumnos' ">

	<br>

	<strong><p>Información General</p></strong>

	<form method="post">
		
		<input type="text" placeholder="No. Empleado" name="nempleado" required>

		<input type="text" placeholder="Nombre" name="nombre" required>
		
		<input type="text" placeholder="Carrera" name="carrera" required>
			
		<input type="text" placeholder="Email" name="email" required>

		<input type="text" placeholder="Contraseña" name="password" required>

		<input type="submit" value="Enviar">

	</form>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcControllerMaestros();
//se invoca la función registroProductosController de la clase MvcController:
$registro -> registroMaestroController();

if(isset($_GET["action"])){

	if($_GET["action"] == "MaestroRegistrado"){

		//echo "Producto Añadido";
	
	}

}

?>
