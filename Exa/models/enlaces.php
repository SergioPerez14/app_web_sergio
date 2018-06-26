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
			echo'	<div class="card">
					  <div class="card-header">
		      			<div class="float-right" style="width: 83%">
							<div class="alert alert-success" role="alert">
			  					<strong>Usuario Registrado!</strong> Se agregó el usuario.
							</div>            			
		      			</div>
		      		  </div>
		  			</div>';
		
		}

		else if($enlaces == "ProductoRegistrado"){

			$module =  "views/modules/productos.php";
			echo'	<div class="card">
					  <div class="card-header">
		      			<div class="float-right" style="width: 83%">
							<div class="alert alert-success" role="alert">
			  					<strong>Producto Registrado!</strong> Se agregó el producto.
							</div>            			
		      			</div>
		      		  </div>
		  			</div>';			
		
		}

		else if($enlaces == "CategoriaRegistrada"){

			$module =  "views/modules/categorias.php";
			echo'	<div class="card">
					  <div class="card-header">
		      			<div class="float-right" style="width: 83%">
							<div class="alert alert-success" role="alert">
			  					<strong>Categoria Registrada!</strong> Se agregó la categoria.
							</div>            			
		      			</div>
		      		  </div>
		  			</div>';			
		
		}

		else if($enlaces == "TiendaRegistrada"){

			$module =  "views/modules/tiendas.php";
			echo'	<div class="card">
					  <div class="card-header">
		      			<div class="float-right" style="width: 83%">
							<div class="alert alert-success" role="alert">
			  					<strong>Tienda Registrada!</strong> Se agregó la tienda.
							</div>            			
		      			</div>
		      		  </div>
		  			</div>';			
		
		}	

		else if($enlaces == "VentaRegistrada"){

			$module =  "views/modules/ventas.php";
			echo'	<div class="card">
					  <div class="card-header">
		      			<div class="float-right" style="width: 83%">
							<div class="alert alert-success" role="alert">
			  					<strong>Venta Completada!</strong> Se realizó corectamente la venta.
							</div>            			
		      			</div>
		      		  </div>
		  			</div>';
		
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
			echo'	<div class="card">
					  <div class="card-header">
		      			<div class="float-right" style="width: 83%">
							<div class="alert alert-info" role="alert">
			  					<strong>Producto Editado!</strong> Se actualizo la informacion.
							</div>            			
		      			</div>
		      		  </div>
		  			</div>';			
		
		}

		else if($enlaces == "StockInsuficiente"){

			$module = "views/modules/ventas.php";
			echo'	<div class="card">
					  <div class="card-header">
	          			<div class="float-right" style="width: 83%">
							<div class="alert alert-danger" role="alert">
			  					<strong>Error!</strong> La cantidad solicitada en la venta, es mayor al stock disponible.
							</div>            			
	          			</div>
	          		  </div>
	      			</div>';

		}

		else if($enlaces == "UsuarioEditado"){

			$module =  "views/modules/usuarios.php";
			echo'	<div class="card">
					  <div class="card-header">
		      			<div class="float-right" style="width: 83%">
							<div class="alert alert-info" role="alert">
			  					<strong>Usuario Editado!</strong> Se actualizo la informacion.
							</div>            			
		      			</div>
		      		  </div>
		  			</div>';			
		
		}

		else if($enlaces == "CategoriaEditada"){

			$module =  "views/modules/categorias.php";
			echo'	<div class="card">
					  <div class="card-header">
		      			<div class="float-right" style="width: 83%">
							<div class="alert alert-info" role="alert">
			  					<strong>Categoria Editada!</strong> Se actualizo la informacion.
							</div>            			
		      			</div>
		      		  </div>
		  			</div>';			
		
		}

		else if($enlaces == "TiendaEditada"){

			$module =  "views/modules/tiendas.php";
			echo'	<div class="card">
					  <div class="card-header">
		      			<div class="float-right" style="width: 83%">
							<div class="alert alert-info" role="alert">
			  					<strong>Tienda Editada!</strong> Se actualizo la informacion.
							</div>            			
		      			</div>
		      		  </div>
		  			</div>';			
		
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