<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar" || $enlaces == "editarmaestros" || $enlaces == "editarcarreras" || $enlaces == "salir" || $enlaces == "maestros" || $enlaces == "alumnos" || $enlaces == "registraralumnos" || $enlaces == "registrarmaestros" || $enlaces == "registrarcarreras" || $enlaces == "carreras"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($enlaces == "ok"){

			$module =  "views/modules/registro.php";
		
		}

		else if($enlaces == "AlumnoRegistrado"){

			$module =  "views/modules/alumnos.php";
		
		}

		else if($enlaces == "MaestroRegistrado"){

			$module =  "views/modules/maestros.php";
		
		}

		else if($enlaces == "CarreraRegistrada"){

			$module =  "views/modules/carreras.php";
		
		}

		else if($enlaces == "fallo"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($enlaces == "AlumnoEditado"){

			$module =  "views/modules/alumnos.php";
		
		}

		else if($enlaces == "MaestroEditado"){

			$module =  "views/modules/maestros.php";
		
		}

		else if($enlaces == "CarreraEditada"){

			$module =  "views/modules/carreras.php";
		
		}

		else{

			$module =  "views/modules/registro.php";

		}
		
		return $module;

	}

}

?>