<?php
//Verifica sesion
session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>Inicio de Sesion</h1>

<form method="post">
	
	<label>Correo: </label>
	<input type="text" placeholder="Correo" name="usuarioRegistro" required>

	<label>Contraseña</label>
	<input type="text" placeholder="Contraseña" name="passwordRegistro" required>

	<input type="submit" value="Enviar">

</form>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
/*$registro = new MvcController();
//se invoca la función registroUsuarioController de la clase MvcController:
$registro -> registroUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

} -->
*/
?>
