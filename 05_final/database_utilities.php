<?php
	//Requiere de las credenciales para la conexion a la base de datos 
	require_once('database_credentials.php');


	$conexion = new mysqli($servidor, $usuario, $password, $bd);

	//Funcion para agregar un nuevo registro al listado y a la base de datos
	function añadir($correo,$password)
	{
		global $conexion;
		$sql = "INSERT INTO usuario (correo,password) VALUES ('$correo','$password')";
		$conexion->query($sql);

	}

	//Funcion para modificar los valores de un registro y actualizarlos
	function modificar($id,$correo,$password)
	{
		global $conexion;
		$sql = "UPDATE usuario SET correo = '$correo', password='$password'where id='$id'";
		$conexion->query($sql);

	}

	//Funcion borrar que como su nombre lo dice permite borrar un elemento del listado y de la base de datos
	function borrar($id)
	{
		global $conexion;
		$sql = "DELETE FROM usuario WHERE id='$id'";
		$conexion->query($sql);
	}

	//Funcion para traer los elementos de la base de datos para formar el listado
	function run_query()
	{
		global $conexion;
		$sql = 'SELECT * FROM usuario';
		$resultados = $conexion->query($sql);
		if($resultados->num_rows)
			return $resultados;
		return false;

	}

	//Funcion para buscar por id
	function busqueda_id($id)
	{
		global $conexion;
		$sql = "SELECT * FROM usuario where id='$id'";
		$resultado = $conexion->query($sql);
		if($resultado->num_rows)
			return mysqli_fetch_assoc($resultado);
		return false;

	}



?>