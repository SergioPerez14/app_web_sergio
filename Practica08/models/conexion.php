








<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=curso_php2","root","");
		return $link;

	}

}

//Verificar conexión correcta
//$a= new Conexion();
//$a -> conectar();

?>
