<?php
//Conexion a base de datos mediante PDO
$dsn = 'mysql:dbname=php_sql_course2;host=localhost';
$user = 'root';
$password = '';

try{
	$pdo = new PDO(	$dsn, 
	$user, 
	$password
	);
} catch( PDOException $e ){

echo 'Error al conectarnos: ' . $e->getMessage();
}