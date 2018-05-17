<?php

  	//El archivo connection.php permite la conexion a la base de datos mediante pdo
	require_once('connection.php');

	$id=$_POST['id'];
	$nombre=$_POST['name'];
	$posicion=$_POST['pos'];
	$carrera=$_POST['carrera'];
	$email=$_POST['email'];

	//Consulta para insertar datos provenientes del formulario de jugadores de futbol
	$sql = "INSERT INTO futbol VALUES ('$id','$nombre','$posicion','$carrera','$email')";
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$statement->fetchAll(PDO::FETCH_OBJ);
	header("Location: index.php");

?>