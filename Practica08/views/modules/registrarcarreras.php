<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<br>
<!-- Formulario para agregar carreras -->
<h4>REGISTRO DE CARRERAS</h4>

	<hr><br>

		<input type="button" style="left: -200px;" class="button radius tiny" value="Listado Carreras" onclick="window.location= 'index.php?action=carreras' ">

	<br>

	<strong><p>Información General</p></strong>

	<form method="post">

		<label>Nombre de la Carrera: </label>
		<input type="text" placeholder="Nombre" name="nombre" required>

		<input type="submit" class="button radius tiny" style="background-color: #360956; left: -1px; width: 400px;" value="Guardar">

	</form>

<?php
//Enviar los datos al controlador MvcControllerCarreras
$registro = new MvcControllerCarreras();
//se invoca la función registroCarrerasController de la clase MvcControllerCarreras:
$registro -> registroCarrerasController();

if(isset($_GET["action"])){

	if($_GET["action"] == "CarreraRegistrada"){

		//echo "Producto Añadido";
	
	}

}

?>
