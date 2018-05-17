<?php
require_once('conexion.php');

function modificarfutbol($id,$nombre,$posicion,$carrera,$email){

	global $conn;
	$sql="UPDATE futbol SET nombre = '{$nombre}', posicion='{$posicion}', carrera= '{$carrera}', email='{$email}' WHERE id = '{$id}'";
    
	$modificarf= $conn->prepare($sql);
    $modificarf->execute();
 }
 function modificarbasquet($id,$nombre,$posicion,$carrera,$email){

	global $conn;
	$sql="UPDATE basquet SET nombre = '{$nombre}', posicion='{$posicion}', carrera= '{$carrera}', email='{$email}' WHERE id = '{$id}'";
    
	$modificarb= $conn->prepare($sql);
    $modificarb->execute();
 }

function get_fut_by_id( $id )
{
	global $conn;
	$sql = "SELECT * FROM futbol WHERE id = {$id}";
	//ejecutamos la consulta
	$fut = $conn->prepare($sql);
	$fut->execute();
	return $fut->fetch(PDO::FETCH_ASSOC);
	
}
function get_bas_by_id( $id )
{
	global $conn;
	$sql = "SELECT * FROM basquet WHERE id = {$id}";
	//ejecutamos la consulta
	$bas = $conn->prepare($sql);
	$bas->execute();
	return $bas->fetch(PDO::FETCH_ASSOC);
	
}

function eliminarf($id){
	global $conn;
	//funcionalidad para eliminar
	$sql = "DELETE FROM futbol WHERE id = '{$id}'";
	//ejecutamos la funcionalidad de eliminación
	$fut = $conn->prepare($sql);
	$fut->execute();
	
}
function eliminarb($id){
	global $conn;
	//funcionalidad para eliminar
	$sql = "DELETE FROM basquet WHERE id = '{$id}'";
	//ejecutamos la funcionalidad de eliminación
	$bas = $conn->prepare($sql);
	$bas->execute();
	
}

function  insertarfutbol($id,$nombre,$posicion,$carrera,$email){

	global $conn;
	$sql = "INSERT INTO futbol (id,nombre,posicion,carrera,email) values('{$id}','{$nombre}','{$posicion}','{$carrera}','{$email}')";

	$fut = $conn->prepare($sql);
	$fut->bindParam('{$nombre}', $nombre);
	$fut->bindParam('{$posicion}', $posicion);
	$fut->bindParam('{$id}', $id);
	$fut->bindParam('{$carrera}', $carrera);
	$fut->bindParam('{$email}', $email);
	$fut->execute();
}

function  insertarbasquet($id,$nombre,$posicion,$carrera,$email){

	global $conn;
	$sql = "INSERT INTO basquet (id,nombre,posicion,carrera,email) values('{$id}','{$nombre}','{$posicion}','{$carrera}','{$email}')";

	$bas = $conn->prepare($sql);
	$bas->bindParam('{$nombre}', $nombre);
	$bas->bindParam('{$posicion}', $posicion);
	$bas->bindParam('{$id}', $id);
	$bas->bindParam('{$carrera}', $carrera);
	$bas->bindParam('{$email}', $email);
	$bas->execute();
}

?>