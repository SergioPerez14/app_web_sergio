<?php

class MvcControllerTutorias{

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
	public function registroTutoriasController(){

		if(isset($_POST["alumno"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "matricula"=>$_POST["alumno"], 
								      "tutor"=>$_POST["tutor"],
								      "fecha"=>$_POST["fecha"],
								      "hora"=>$_POST["hora"],
								  	  "tipo"=>$_POST["tipo"],
								  	  "campo"=>$_POST["tema"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = DatosTutorias::registroTutoriasModel($datosController, "tutorias");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=TutoriaRegistrada");

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

	public function vistaTutoriasController(){

		$respuesta = DatosTutorias::vistaTutoriasModel("tutorias");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["alumno"].'</td>
				<td>'.$item["tutor"].'</td>
				<td>'.$item["fecha"].'</td>
				<td>'.$item["hora"].'</td>
				<td>'.$item["tipotutoria"].'</td>
				<td>'.$item["campo"].'</td>
				<td><a href="index.php?action=editartutorias&id='.$item["id"].'"><button class="button radius tiny secondary">Editar</button></a></td>
				<td><a href="index.php?action=tutorias&idBorrar='.$item["id"].'"><button class="button radius tiny alert">Borrar</button></a></td>
			</tr>';

		}

	}

	#EDITAR ALUMNO
	#------------------------------------

	public function editarTutoriaController(){

		$datosController = $_GET["id"];
		$respuesta = DatosTutorias::editarTutoriaModel($datosController, "tutorias");

		echo'<input type="text" value="'.$respuesta["id"].'" name="ntutoriaEditar" readonly>

			 <input type="text" value="'.$respuesta["alumno"].'" name="alumnoEditar" readonly>

			 <input type="text" value="'.$respuesta["tutor"].'" name="tutorEditar" required>

			 <input type="text" value="'.$respuesta["fecha"].'" name="fechaEditar" required>
 
 			 <input type="text" value="'.$respuesta["hora"].'" name="horaEditar" required>
 
 			 <input type="text" value="'.$respuesta["tipotutoria"].'" name="tipoEditar" required>

			 <input type="text" value="'.$respuesta["campo"].'" name="temaEditar" required>

			 <input type="submit" class="button radius tiny" style="background-color: #360956; left: -1px; width: 400px;" value="Actualizar">';

	}

	#ACTUALIZAR ALUMNO
	#------------------------------------
	public function actualizarTutoriaController(){

		if(isset($_POST["tutorEditar"])){

			$datosController = array( "id"=>$_POST["ntutoriaEditar"],
									  "alumno"=>$_POST["alumnoEditar"],
				                      "tutor"=>$_POST["tutorEditar"],
				                      "fecha"=>$_POST["fechaEditar"],
				                  	  "hora"=>$_POST["horaEditar"],
				                  	  "tipotutoria"=>$_POST["tipoEditar"],
				                  	  "tema"=>$_POST["temaEditar"]);
			
			$respuesta = DatosTutorias::actualizarTutoriaModel($datosController, "tutorias");

			if($respuesta == "success"){

				header("location:index.php?action=TutoriaEditada");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR ALUMNO
	#------------------------------------
	public function borrarTutoriasController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = DatosTutorias::borrarTutoriasModel($datosController, "tutorias");

			if($respuesta == "success"){

				header("location:index.php?action=tutorias");
			
			}

		}

	}

}






////
?>