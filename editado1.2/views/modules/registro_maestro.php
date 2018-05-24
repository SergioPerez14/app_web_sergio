<h1>REGISTRO DE MAESTROS</h1>

<form method="post">
	
	<input type="text" placeholder="No. Empleado" name="nempleadoRegistro" required>

	<input type="text" placeholder="Carrera" name="carreraRegistro" required>

	<input type="text" placeholder="Nombre" name="nombreRegistro" required>	

	<input type="text" placeholder="Email" name="emailRegistro" required>

	<input type="text" placeholder="Contraseña" name="passwordRegistro" required>

	<input type="submit" value="Enviar">

</form>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcController();
//se invoca la función registroUsuarioController de la clase MvcController:
$registro -> registroMaestroController();

if(isset($_GET["action"])){

	if($_GET["action"] == "maestroOk"){

		echo "Maestro añadido";
	
	}

}

?>
