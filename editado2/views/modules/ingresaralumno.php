<h1>INGRESAR ALUMNO</h1>

	<form method="post">
		
		<input type="text" placeholder="Matricula" name="matriculaRegistro" required>

		<input type="text" placeholder="Nombre" name="nombreRegistro" required>

		<input type="text" placeholder="Carrera" name="carreraRegistro" required>

		<input type="text" placeholder="Tutor" name="tutorRegistro" required>

		<input type="submit" value="Enviar">

	</form>

<?php

$ingreso = new MvcController();
$ingreso -> registroUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

		echo "Fallo al ingresar";
	
	}

}

?>