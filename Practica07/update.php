<?php

  	//El archivo connection.php permite la conexion a la base de datos mediante pdo
	require_once('connection.php');
	$id = $_GET['id'];
	global $pdo,$sql;

	$id=$_POST['id'];
	$username=$_POST['name'];
	$password=$_POST['pos'];

	//Consulta de update para la modificacion de la informacion del jugador de futbol
	$sql = 'UPDATE `usuarios` SET `username`=:name,`password`=:pos WHERE id=:id';

	$statement = $pdo->prepare($sql);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':name',$username);
	$statement->bindParam(':pos',$password);
	$statement->execute();
	$result = $statement->fetchAll();
	header("Location: usuarios.php");	
	
?>