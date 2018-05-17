<?php 

    //Conexion en la BD con el nombre de usuario y contraseña para acceder
	$username = 'root';
	$password = '';
	//Asignacion de base de datos y el localhost
	//$var = null;
	

    //Codigo obligatoriamente ejecutado de error no conexion 
	try{
		$conexion = new PDO('mysql: host=localhost; dbname=bd2', $username, $password);
	}
	//Si marca error envia directo a catch para enviar el mensaje de error
	catch(PDOException $ex){
        print'Error:'. $ex->getMessage().'<br>';
	}

 ?>