<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<br>
<!-- Formulario para el registro de  maestros -->
<h4>REGISTRO DE MAESTROS</h4>

	<hr><br>

		<input type="button" style="left: -200px;" class="button radius tiny" value="Listado Maestros" onclick="window.location= 'index.php?action=maestros' ">

	<br>

	<strong><h4>Información General</h4></strong>

	<br>

	<form method="post">
		
		<label>No. Empleado: </label>
		<input type="text" placeholder="No. Empleado" name="nempleado" required>

		<label>Nombre: </label>
		<input type="text" placeholder="Nombre" name="nombre" required>
		
		<label>Carrera: </label>
		<select name="carrera">
		  	<?php 
		  		$carreras = new MvcController();
		  		$carreras -> ObtenerCarrerasController();
		  	?>
		</select>
		
		<label>Email: </label>
		<input type="text" placeholder="Email" name="email" required>

		<label>Contraseña</label>
		<input type="text" placeholder="Contraseña" name="password" required>

		<input type="submit" class="button radius tiny" style="background-color: #360956; left: -1px; width: 400px;" value="Enviar">

	</form>

<?php
//Enviar los datos al controlador MvcControllerMaestros
$registro = new MvcControllerMaestros();
//se invoca la función registroMaestroController de la clase MvcControllerMaestros:
$registro -> registroMaestroController();

if(isset($_GET["action"])){

	if($_GET["action"] == "MaestroRegistrado"){

		//echo "Producto Añadido";
	
	}

}

?>
