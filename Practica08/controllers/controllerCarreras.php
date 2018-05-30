<?php

class MvcControllerCarreras{

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

	#REGISTRO DE CARRERAS
	#------------------------------------
	public function registroCarrerasController(){

		if(isset($_POST["nombre"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "nombre"=>$_POST["nombre"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = DatosCarreras::registroCarrerasModel($datosController, "carreras");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=CarreraRegistrada");

			}

			else{

				header("location:index.php");
			}

		}

	}

	#VISTA DE ALUMNOS
	#------------------------------------

	public function vistaCarrerasController(){

		$respuesta = DatosCarreras::vistaCarrerasModel("carreras");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["nombre"].'</td>
				<td><a href="index.php?action=editarcarreras&id='.$item["id"].'"><button class="button radius tiny secondary">Editar</button></a></td>
				<td><a href="index.php?action=carreras&idBorrar='.$item["id"].'"><button class="button radius tiny alert">Borrar</button></a></td>
			</tr>';

		}

	}

	#VISTA DE REPORTE DE CARRERAS
	#------------------------------------

	public function vistaReportesCarreraController(){

		$respuesta = DatosCarreras::vistaCarrerasModel("carreras");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["nombre"].'</td>
			</tr>';

		}

	}


	#EDITAR CARRERA
	#------------------------------------

	public function editarCarreraController(){

		$datosController = $_GET["id"];
		$respuesta = DatosCarreras::editarCarreraModel($datosController, "carreras");

		echo'
			<labe>ID Carrera:</label>
			<input type="text" value="'.$respuesta["id"].'" name="idEditar" readonly>

			<labe>Carrera:</label>
			 <input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>

			 <input type="submit" class="button radius tiny" style="background-color: #360956; left: -1px; width: 400px;" value="Actualizar">';

	}

	#ACTUALIZAR CARRERA
	#------------------------------------
	public function actualizarCarreraController(){

		if(isset($_POST["nombreEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
									  "nombre"=>$_POST["nombreEditar"]);
			
			$respuesta = DatosCarreras::actualizarCarreraModel($datosController, "carreras");

			if($respuesta == "success"){

				header("location:index.php?action=CarreraEditada");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR CARRERA
	#------------------------------------
	public function borrarCarrerasController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = DatosCarreras::borrarCarreraModel($datosController, "carreras");

			if($respuesta == "success"){

				header("location:index.php?action=carreras");
			
			}

		}

	}

}






////
?>