<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<br>
<!-- Formulario para la insercion de Alumnos -->
<h4>REGISTRO DE ALUMNOS</h4>

	<hr><br>

		<input type="button" style="left: -200px;" class="button radius tiny" value="Listado Alumnos" onclick="window.location= 'index.php?action=alumnos' ">

	<br>

	<strong><h4>Información General</h4></strong>

	<br>

	<form method="post">
		
		<label>Matricula: </label>
		<input type="text" placeholder="Matricula" name="matricula" required>

		<label>Nombre: </label>
		<input type="text" placeholder="Nombre" name="nombre" required>
		
		<label>Carrera: </label>
		<!--<input type="text" placeholder="Carrera" name="carrera" required> -->

		<select name="carrera">
		  	<?php 
		  		$carreras = new MvcController();
		  		$carreras -> ObtenerCarrerasController();
		  	?>
		</select>

		<label>Tutor: </label>
		<select name="tutor">
		  	<?php 
		  		$tutor = new MvcController();
		  		$tutor -> ObtenerTutorController();
		  	?>
		</select>
			
		<!--<input type="text" placeholder="Tutor" name="tutor" required> -->

		<input type="submit" class="button radius tiny" style="background-color: #360956; left: -1px; width: 400px;" value="Enviar">

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
