<?php

/**
* 
*/
class Controlador
{

	function template(){
		include "vistas/template.php";
	}
	
	function registroUsuario()
	{
		if(isset($_POST["nombre"]))
		{
			$datosCampos["nombre"] = $_POST["nombre"];
			$datosCampos["telefono"] = $_POST["telefono"];
		}

		$datosCampos->
	}
}




?>