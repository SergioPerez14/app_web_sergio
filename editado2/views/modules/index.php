<h1>LOGIN</h1>

<form method="post">
	
	<input type="text" placeholder="Correo" name="usuarioRegistro" required>

	<input type="text" placeholder="Constraseña" name="passwordRegistro" required>

	<input type="submit" value="Ingresar">

</form>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
//$registro = new MvcController();
//se invoca la función registroUsuarioController de la clase MvcController:
//$registro -> registroUsuarioController();

/*if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}*/

?>
