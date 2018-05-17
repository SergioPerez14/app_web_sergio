<?php

  	//El archivo connection.php permite la conexion a la base de datos mediante pdo
	require_once('connection.php');
	$id = $_GET['id'];
	global $pdo,$sql;

	$id=$_POST['id'];
	$nombre=$_POST['name'];
	$descripcion=$_POST['des'];
	$preciou=$_POST['precio'];

	//Consulta de update para la modificacion de la informacion del jugador de futbol
	$sql = 'UPDATE `productos` SET `nombre`=:name,`descripcion`=:des,`preciounitario`=:precio WHERE id=:id';

	$statement = $pdo->prepare($sql);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':name',$nombre);
	$statement->bindParam(':des',$descripcion);
	$statement->bindParam(':precio',$preciou);
	$statement->execute();
	$result = $statement->fetchAll();
	header("Location: productos.php");		
	
?>