<?php

$dsn = 'mysql:dbname=practica06;host=localhost';//nombre de la bd y el servidor a usar
$user = 'root';//Usuario de la bd
$password = '';//cpntraseña del server
$pdo; 
try
{
	global $pdo;
    $pdo = new PDO( $dsn, 
                    $user, 
                    $password);
}
catch(PDOException $e)
{
    echo 'Error al conectarnos: ' . $e->getMessage();
}