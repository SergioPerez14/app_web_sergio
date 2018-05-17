<?php 
	$servidor ='127.0.0.1';
	$usuario='root';
	$password='usbw';
	$bd='general';
	$puerto=3307;

	try{
		$dbcon =new PDO("mysql:host={$servidor};dbname={$bd};port={$puerto}",$usuario,$password);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo $e->getMessage();
	}

	$sql = 'insert into contactos(nombre,apellidos, telefono, correo) values(:nombre,:apellidos,:telefono,:correo)';
	$query=$dbcon->prepare($sql);

	$query->bindparam(':nombre',$nombre);
	$query->bindParam(':apellidos',$apellidos);
	$query->bindParam(':telefono',$telefono);
	$query->bindParam(':correo',$correo);

	
	$nombre='omar';
	$apellidos='jasso';
	$telefono='8341337244';
	$correo ='ojasso@gmail.com';

/*	$dbcon =new mysqli($servidor,$usuario,$password,$bd);
	$sql = "insert into contactos(nombre,apellidos, telefono, correo) values('$nombre','$apellidos','$telefono','$correo')";
	$dbcon->query($sql);
*/
	$query ->execute();





 ?>