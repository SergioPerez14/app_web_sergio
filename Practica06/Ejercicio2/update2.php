<?php

  	//El archivo connection.php permite la conexion a la base de datos mediante pdo
	require_once('connection.php');
	$id = $_GET['id'];
	global $pdo,$sql;

	$id=$_POST['id'];
	$nombre=$_POST['name'];
	$posicion=$_POST['pos'];
	$carrera=$_POST['carrera'];
	$email=$_POST['email'];

	//Consulta de update para la modificacion de la informacion del jugador de basquetbol
	$sql = 'UPDATE `basquetbol` SET `nombre`=:name,`posicion`=:pos,`carrera`=:carrera,`email`=:email WHERE id=:id';

	$statement = $pdo->prepare($sql);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':name',$nombre);
	$statement->bindParam(':pos',$posicion);
	$statement->bindParam(':carrera',$carrera);
	$statement->bindParam(':email',$email);
	$statement->execute();
	$result = $statement->fetchAll();
	header("Location: index2.php");	
	
?>