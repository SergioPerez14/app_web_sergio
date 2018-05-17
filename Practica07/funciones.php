<?php

	//Se requerira el archivo database_credentials.php para tener las credenciales de la base de datos
	require_once('connection.php');

	//Se crea la conexion de base de datos usando PDO
	try
	{

		$PDO = new PDO(	$dsn, $user, $password);

	}
	catch(PDOException $e)
	{

		echo 'Error al conectarnos: ' . $e->getMessage();
	}

  	function buscarUsuario($user,$password)
  	{
  		global $PDO;

  		$safePassword = md5($password);
  		$sql = "SELECT * FROM usuarios where username = '$user' AND password = '$safePassword'";
  		$statement = $PDO->PREPARE($sql);
		$statement->EXECUTE();
		if($statement->rowCount() > 0)
		{
			return true;
		}
		return false;
  	}

  	function querydetalles($id)
  	{
  		global $PDO;

  		$sql = "SELECT * FROM detalle_venta as dv inner join productos as pr on dv.id_producto = pr.id where id_venta = dv.id_venta";
  		$statement = $PDO->PREPARE($sql);
		$statement->EXECUTE();
		$results = $statement-> fetchAll();
		return $results;
  	}

?>