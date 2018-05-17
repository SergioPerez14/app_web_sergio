<?php
	$serv='localhost';
	$user='root';
	$contrasena='usbw';
	$bd='general';
	$puerto=3307;

	//$sql="insert into contactos(nombre,apellidos,telefono, correo) values(:nombre,:apellidos,:telefono,:correo)";
	$sql="call spNuevoContacto(?,?,?,?)";
	$bdcon=new PDO("mysql:host={$serv};	dbname={$bd}; port={$puerto}",$user,$contrasena);
	//$dbcon =new PDO("mysql:host={$servidor};dbname={$bd};port={$puerto}",$usuario,$password);


	$stmt=$bdcon->prepare($sql);
	$stmt->bindparam(1,$nombre);
	$stmt->bindparam(2,$apellidos);
	$stmt->bindparam(3,$telefono);
	$stmt->bindparam(4,$correo);

	$nombre='mello';
	$apellidos='ramirez';
	$telefono='484 5643';
	$correo='homero@gmail';

	$stmt->execute();
	$id=$bdcon->lastInsertId();
	echo "Contacto registrado con el id: $id  <br>";
	$stmt=null;

	$sql="select * from ejemplo";
	$query=$bdcon->prepare($sql);
	if($query->execute()){
		while ($fila=$query->fetch()) {
		echo "Nombre: ".$fila["nombre"]." apellidos: " .$fila["apellidos"]."<br>";		}
	}

/*	foreach ($resultados as $fila) {
		echo "Nombre: "-$fila["nombre"]." apellidos" .$fila["apellidos"]."<br>";
	}*/

	$query=null;
 ?>
