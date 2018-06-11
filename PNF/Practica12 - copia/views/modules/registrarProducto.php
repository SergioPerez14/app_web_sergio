<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<br>
<!-- Formulario para la insercion de Alumnos -->
<h4>REGISTRO DE USUARIOS</h4>

	<hr><br>

		<input type="button" style="left: -200px;" class="button radius tiny" value="Listado Usuarios" onclick="window.location= 'index.php?action=productos'">

	<br>

	<strong><h4>Información General</h4></strong>

	<br>

	<form method="post">

		<label>Nombre: </label>
		<input type="text" placeholder="Nombre" name="nombre" required>
		
		<label>Descripcion: </label>
		<input type="text" placeholder="Descripcion" name="descripcion" required>

		<label>Cantidad: </label>
		<input type="text" placeholder="Cantidad" name="cantidad" required>

		<label>Precio Unitario: </label>
		<input type="text" placeholder="Precio" name="precio" required>

		<input type="submit" class="button radius tiny" name="enviar" style="background-color: #360956; left: -1px; width: 400px;" value="Enviar">

	</form>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcController();
//se invoca la función registroProductosController de la clase MvcController:
$registro -> registroProductoController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ProductoRegistrado"){

		//echo "Producto Añadido";
	
	}

}

?>
