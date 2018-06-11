<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar" || $enlaces == "salir" || $enlaces == "registrarUsuario" || $enlaces == "productos" || $enlaces == "registrarProducto" || $enlaces == "editarProducto" || $enlaces == "dashboard" || $enlaces == "categorias" || $enlaces == "registrarCategoria" || $enlaces == "editarCategoria" || $enlaces == "historial" || $enlaces == "añadirStockProducto" || $enlaces == "quitarStockProducto" || $enlaces == "help" || $enlaces == "tiendas" || $enlaces == "registrarTienda" || $enlaces == "editarTienda" || $enlaces == "ventas" || $enlaces == "registrarVenta" || $enlaces == "editarVenta"){

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

		else if($enlaces == "CategoriaRegistrada"){

			$module =  "views/modules/categorias.php";
		
		}

		else if($enlaces == "TiendaRegistrada"){

			$module =  "views/modules/tiendas.php";
		
		}				

		else if($enlaces == "TiendaActivada"){

			$module =  "views/modules/tiendas.php";
		
		}

		else if ($enlaces == "TiendaDesactivada") {
			
			$module =  "views/modules/tiendas.php";

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

		else if($enlaces == "CategoriaEditada"){

			$module =  "views/modules/categorias.php";
		
		}

		else if($enlaces == "TiendaEditada"){

			$module =  "views/modules/tiendas.php";
		
		}		

		else if($enlaces == "StockAñadido"){

			$module =  "views/modules/historial.php";
		
		}

		else if($enlaces == "StockReducido"){

			$module =  "views/modules/historial.php";
		
		}

		else{

			$module =  "views/modules/registro.php";

		}
		
		return $module;

	}

}

?>