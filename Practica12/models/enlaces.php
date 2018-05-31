<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar" || $enlaces == "salir" || $enlaces == "registrarUsuario" || $enlaces == "productos" || $enlaces == "registrarProducto" || $enlaces == "editarProducto" || $enlaces == "dashboard"){

			$module =  "views/modules/".$enlaces.".php";
		
		}	

		else if($enlaces == "index"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($enlaces == "ok"){

			$module =  "views/modules/registro.php";
		
		}

		else if($enlaces == "UsuarioRegistrado"){

			$module =  "views/modules/usuarios.php";
		
		}

		else if($enlaces == "ProductoRegistrado"){

			$module =  "views/modules/productos.php";
		
		}

		else if($enlaces == "fallo"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($enlaces == "ProductoEditado"){

			$module =  "views/modules/productos.php";
		
		}

		else if($enlaces == "UsuarioEditado"){

			$module =  "views/modules/usuarios.php";
		
		}

		else{

			$module =  "views/modules/registro.php";

		}
		
		return $module;

	}

}

?>