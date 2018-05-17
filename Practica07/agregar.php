<?php

  	//El archivo connection.php permite la conexion a la base de datos mediante pdo
	require_once('connection.php');

	$username=$_POST['name'];
	$password=$_POST['pos'];

	$safePassword = md5($password);
	$sql = "INSERT INTO usuarios (`username`, `password`) VALUES ('$username','$safePassword')";
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$statement->fetchAll(PDO::FETCH_OBJ);
	header("Location: usuarios.php");

?>