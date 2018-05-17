<?php

  	//El archivo connection.php permite la conexion a la base de datos mediante pdo
	require_once('connection.php');

	$name=$_POST['name'];
	$descripcion=$_POST['des'];
	$precio=$_POST['precio'];

	//Consulta para insertar datos provenientes del formulario de jugadores de futbol
	$sql = "INSERT INTO productos (`nombre`, `descripcion`, `preciounitario`) VALUES ('$name','$descripcion','$precio')";
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$statement->fetchAll(PDO::FETCH_OBJ);
	header("Location: productos.php");

?>