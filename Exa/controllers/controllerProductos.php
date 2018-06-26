<?php

class MvcControllerProductos{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}


		#REGISTRO DE PRODUCTOS
	#------------------------------------
	public function registroProductosController(){

		if(isset($_POST["productName"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "name"=>$_POST["productName"], 
								      "desc"=>$_POST["ProductDesription"],
								      "preciob"=>$_POST["ProductBuyPrice"],
								  	  "precios"=>$_POST["ProductSalePrice"],
									  "precio"=>$_POST["ProductPrice"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = DatosProductos::registroProductosModel($datosController, "products");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=Productosok");

			}

			else{

				header("location:index.php");
			}

		}

	}

////

}
?>