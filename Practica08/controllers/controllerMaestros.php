<?php

class MvcControllerMaestros{

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

	#REGISTRO DE ALUMNOS
	#------------------------------------
	public function registroMaestroController(){

		if(isset($_POST["nempleado"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "nempleado"=>$_POST["nempleado"], 
								      "nombre"=>$_POST["nombre"],
								      "carrera"=>$_POST["carrera"],
								      "email"=>$_POST["email"],
								  	  "password"=>$_POST["password"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = DatosMaestros::registroMaestroModel($datosController, "maestros");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=MaestroRegistrado");

			}

			else{

				header("location:index.php");
			}

		}

	}

	#INGRESO DE MAESTROS
	#------------------------------------
	public function ingresoMaestroController(){

		if(isset($_POST["usuarioIngreso"])){

			$datosController = array( "email"=>$_POST["usuarioIngreso"], 
								      "password"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::ingresoMaestroModel($datosController, "maestros");
			//Valiación de la respuesta del modelo para ver si es un usuario correcto.
			if($respuesta["email"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){

				session_start();

				$_SESSION["validar"] = true;

				header("location:index.php?action=alumnos");

			}

			else{

				header("location:index.php?action=fallo");

			}

		}	

	}

	#VISTA DE ALUMNOS
	#------------------------------------

	public function vistaMaestrosController(){

		$respuesta = DatosMaestros::vistaMaestrosModel("maestros");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nempleado"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["carrera"].'</td>
				<td>'.$item["email"].'</td>
				<td>'.$item["password"].'</td>
				<td><a href="index.php?action=editarmaestros&id='.$item["nempleado"].'"><button class="button radius tiny secondary">Editar</button></a></td>
				<td><a href="index.php?action=maestros&idBorrar='.$item["nempleado"].'"><button class="button radius tiny alert">Borrar</button></a></td>
			</tr>';

		}

	}

	#EDITAR ALUMNO
	#------------------------------------

	public function editarMaestrosController(){

		$datosController = $_GET["id"];
		$respuesta = DatosMaestros::editarMaestrosModel($datosController, "maestros");

		echo'<input type="text" value="'.$respuesta["nempleado"].'" name="empleadoEditar" readonly>

			 <input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>

			 <input type="text" value="'.$respuesta["carrera"].'" name="carreraEditar" required>

			 <input type="text" value="'.$respuesta["email"].'" name="emailEditar" required>

			 <input type="text" value="'.$respuesta["password"].'" name="contraEditar" required>

			 <input type="submit" class="button radius tiny" style="background-color: #360956; left: -1px; width: 400px;" value="Actualizar">';

	}

	#ACTUALIZAR ALUMNO
	#------------------------------------
	public function actualizarMaestrosController(){

		if(isset($_POST["empleadoEditar"])){

			$datosController = array( "nempleado"=>$_POST["empleadoEditar"],
									  "nombre"=>$_POST["nombreEditar"],
				                      "carrera"=>$_POST["carreraEditar"],
				                      "email"=>$_POST["emailEditar"],
				                  	  "password"=>$_POST["contraEditar"]);
			
			$respuesta = DatosMaestros::actualizarMaestrosModel($datosController, "maestros");

			if($respuesta == "success"){

				header("location:index.php?action=MaestroEditado");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR ALUMNO
	#------------------------------------
	public function borrarMaestrosController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = DatosMaestros::borrarMaestrosModel($datosController, "maestros");

			if($respuesta == "success"){

				header("location:index.php?action=maestros");
			
			}

		}

	}

}






////
?>