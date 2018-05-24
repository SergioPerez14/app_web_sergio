<h1>REGISTRO DE ALUMNOS</h1>

<form method="post">
	
	<input type="text" placeholder="Matricula" name="matriculaRegistro" required>

	<input type="text" placeholder="Nombre" name="nombreRegistro" required>

	<input type="text" placeholder="Carrera" name="carreraRegistro" required>

	<input type="text" placeholder="Tutor" name="tutorRegistro" required>

	<input type="submit" value="Enviar">

</form>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcController();
//se invoca la función registroUsuarioController de la clase MvcController:
$registro -> registroAlumnoController();

if(isset($_GET["action"])){

	if($_GET["action"] == "alumnoOk"){

		echo "Alumno añadido";
	
	}

}

?>
