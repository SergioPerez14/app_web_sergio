<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>REGISTRO DE CARRERAS</h1>

	<hr>

	<input type="button" value="Listado Carreras" onclick="window.location= 'index.php?action=carreras' ">

	<br>

	<strong><p>Información General</p></strong>

	<form method="post">

		<input type="text" placeholder="Nombre" name="nombre" required>

		<input type="submit" value="Guardar">

	</form>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcControllerCarreras();
//se invoca la función registroProductosController de la clase MvcController:
$registro -> registroCarrerasController();

if(isset($_GET["action"])){

	if($_GET["action"] == "CarreraRegistrada"){

		//echo "Producto Añadido";
	
	}

}

?>
