<?php

  	//El archivo connection.php permite la conexion a la base de datos mediante pdo
	require_once('connection.php');
	$id = $_GET['id'];

	//Consulta que permite la eliminacion de un usuario o jugador de futbol
	$sql = "DELETE FROM usuarios WHERE id='$id'";

	$statement = $pdo->prepare($sql);
	$statement->bindParam(':id',$id);
	$statement->execute();
	$result = $statement->fetchAll();
	header("Location: usuarios.php");	
	
?>