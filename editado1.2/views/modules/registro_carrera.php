<h1>REGISTRO DE CARRERAS</h1>

<form method="post">
	
	<input type="text" placeholder="Nombre" name="ncarreraRegistro" required>

	<input type="submit" value="Enviar">

</form>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcController();
//se invoca la función registroUsuarioController de la clase MvcController:
$registro -> registroCarreraController();

if(isset($_GET["action"])){

	if($_GET["action"] == "carrerasOk"){

		echo "Carrera Añadida";
	
	}

}

?>
