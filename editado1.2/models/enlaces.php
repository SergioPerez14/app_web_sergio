<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar" || $enlaces == "logout" || $enlaces == "registro_alumno"
			|| $enlaces == "registro_maestro" || $enlaces == "registro_carrera" || $enlaces == "alumnos" || $enlaces == "maestros"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/menu.php";
		
		}

		else if($enlaces == "carrerasOk"){

			$module =  "views/modules/registro_carrera.php";
		
		}

		else if($enlaces == "alumnoOk"){

			$module =  "views/modules/registro_alumno.php";
		
		}

		else if($enlaces == "maestroOk"){

			$module =  "views/modules/registro_maestro.php";
		
		}

		else if($enlaces == "ok"){

			$module =  "views/modules/registro.php";
		
		}

		else if($enlaces == "fallo"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($enlaces == "cambio"){

			$module =  "views/modules/usuarios.php";
		
		}

		else{

			$module =  "views/modules/menu.php";

		}
		
		return $module;

	}

}

?>