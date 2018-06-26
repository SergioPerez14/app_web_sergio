<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces == "alumnas" || $enlaces == "editar" || $enlaces == "salir" || $enlaces == "registrarAlumnas" || $enlaces == "productos" || $enlaces == "registrarProducto" || $enlaces == "editarProducto" || $enlaces == "dashboard" || $enlaces == "grupos" || $enlaces == "registrarGrupo" || $enlaces == "editarGrupo" || $enlaces == "historial" || $enlaces == "añadirStockProducto" || $enlaces == "quitarStockProducto" || $enlaces == "help" || $enlaces == "tiendas" || $enlaces == "registrarTienda" || $enlaces == "editarTienda" || $enlaces == "pagos" || $enlaces == "registrarPago" || $enlaces == "editarPago" || $enlaces == "registrarPago2"){

			$module =  "views/modules/".$enlaces.".php";
		
		}	

		else if($enlaces == "index"){

			$module =  "views/modules/registro.php";
		
		}

		else if($enlaces == "ok"){

			$module =  "views/modules/registro.php";
		
		}

		else if($enlaces == "AlumnaRegistrada"){

			$module =  "views/modules/alumnas.php";
			/*echo'	<div class="card">
					  <div class="card-header">
		      			<div class="float-right" style="width: 83%">
							<div class="alert alert-success" role="alert">
			  					<strong>Alumna Registrada!</strong> Se agregó la alumna.
							</div>            			
		      			</div>
		      		  </div>
		  			</div>';*/
		
		}

		else if($enlaces == "PagoRealizado"){

			$module =  "views/modules/pagos.php";
			/*echo'	<div class="card">
					  <div class="card-header">
		      			<div class="float-right" style="width: 83%">
							<div class="alert alert-success" role="alert">
			  					<strong>Producto Registrado!</strong> Se agregó el producto.
							</div>            			
		      			</div>
		      		  </div>
		  			</div>';*/			
		
		}

		else if($enlaces == "GrupoRegistrado"){

			$module =  "views/modules/grupos.php";
/*			echo'	<div class="card">
					  <div class="card-header">
		      			<div class="float-right" style="width: 83%">
							<div class="alert alert-success" role="alert">
			  					<strong>Grupo Registrado!</strong> Se agregó el grupo.
							</div>            			
		      			</div>
		      		  </div>
		  			</div>';			*/
		
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

		else if($enlaces == "AlumnaEditada"){

			$module =  "views/modules/alumnas.php";
			/*echo'	<div class="card">
					  <div class="card-header">
		      			<div class="float-right" style="width: 83%">
							<div class="alert alert-info" role="alert">
			  					<strong>Usuario Editado!</strong> Se actualizo la informacion.
							</div>            			
		      			</div>
		      		  </div>
		  			</div>';*/			
		
		}

		else if($enlaces == "GrupoEditado"){

			$module =  "views/modules/grupos.php";
			/*echo'	<div class="card">
					  <div class="card-header">
		      			<div class="float-right" style="width: 83%">
							<div class="alert alert-info" role="alert">
			  					<strong>Grupo Editado!</strong> Se actualizo la informacion.
							</div>            			
		      			</div>
		      		  </div>
		  			</div>';*/			
		
		}

		else if($enlaces == "PagoEditado"){

			$module =  "views/modules/pagos.php";
			/*echo'	<div class="card">
					  <div class="card-header">
		      			<div class="float-right" style="width: 83%">
							<div class="alert alert-info" role="alert">
			  					<strong>Tienda Editada!</strong> Se actualizo la informacion.
							</div>            			
		      			</div>
		      		  </div>
		  			</div>';			*/
		
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