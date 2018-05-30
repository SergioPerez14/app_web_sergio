<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>REGISTRO DE ALUMNOS</h1>

<form method="post">
	
	<input type="text" placeholder="Product" name="productName" required>

	<input type="text" placeholder="Description" name="ProductDesription" required>
	
	<input type="text" placeholder="Buy price" name="ProductBuyPrice" required>
		
	<input type="text" placeholder="Sale price" name="ProductSalePrice" required>

	<input type="text" placeholder="Price" name="ProductPrice" required>

	<input type="submit" value="Enviar">

</form>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcControllerProductos();
//se invoca la función registroProductosController de la clase MvcController:
$registro -> registroProductosController();

if(isset($_GET["action"])){

	if($_GET["action"] == "Productosok"){

		echo "Producto Añadido";
	
	}

}

?>
