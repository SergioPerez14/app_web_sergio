<?php

require_once "conexion.php";


class DB
{
	
	function registrarUsuarios($datosCampos,$tabla)
	{
		$stmt -> conexion::conexion()->prepare("INSERT INTO empleados (nombre, telefono) VALUES (:nombre,:telefono)");
		$stmt -> bindParam(":nombre",$datosCampos["nombre"]);
		$stmt -> bindParam(":telefono",$datosCampos["telefono"]);

		$stmt -> execute();

		$stmt ->close();

	}
}

?>