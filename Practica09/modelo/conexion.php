<?php

class Conexion
{
	
	function conexion()
	{
		$pdo = new PDO("mysql_host:localhost;db_name:curso_php;","root","");
		return $pdo;
	}
}

?>