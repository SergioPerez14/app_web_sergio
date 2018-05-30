<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<br>
<!-- Formulario para el registro de  tutorias -->
<h4>REGISTRO DE TUTORIAS</h4>

	<hr><br>

		<input type="button" style="left: -200px;" class="button radius tiny" value="Listado Tutorias" onclick="window.location= 'index.php?action=tutorias' ">

	<br>

	<strong><h4>Información General</h4></strong>

	<br>

	<form method="post">

		<label>Alumno: </label>		
		<input type="text" placeholder="Matricula" name="alumno" required>

		<label>Tutor: </label>
		<select name="tutor">
		  	<?php 
		  		$tutor = new MvcController();
		  		$tutor -> ObtenerTutorController();
		  	?>
		</select>

		<label>Fecha: </label>
		<input type="text" placeholder="Fecha - Formato: YYYY-MM-DD" name="fecha" required>

		<label>Hora: </label>
		<input type="text" placeholder="Hora - Formato: 00:00" name="hora" required>

		<label>Tipo: </label>
		  <select name="tipo">
		    <option>Individual</option>
		    <option>Grupal</option>
		  </select>

		<label>Tema: </label>
		<input type="text" placeholder="Tema" name="tema" required>

		<input type="submit" class="button radius tiny" style="background-color: #360956; left: -1px; width: 400px;" value="Enviar">

	</form>

<?php
//Enviar los datos al controlador MvcControllerTutorias.
$registro = new MvcControllerTutorias();
//se invoca la función registroProductosController de la clase MvcControllerTutorias:
$registro -> registroTutoriasController();

if(isset($_GET["action"])){

	if($_GET["action"] == "TutoriaRegistrada"){

		//echo "Producto Añadido";
	
	}

}

?>
