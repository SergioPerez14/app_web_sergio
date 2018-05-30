<?php

class MvcController{

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
	public function registroAlumnoController(){

		if(isset($_POST["matricula"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "matricula"=>$_POST["matricula"], 
								      "nombre"=>$_POST["nombre"],
								      "carrera"=>$_POST["carrera"],
								      "tutor"=>$_POST["tutor"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroAlumnoModel($datosController, "alumnos");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=AlumnoRegistrado");

			}

			else{

				header("location:index.php");
			}

		}

	}

	#OBTIENE LAS CARRERAS
	#------------------------------------
	public function ObtenerCarrerasController(){


		$respuesta = Datos::ObtenerCarrerasModel("carreras");

		foreach($respuesta as $row => $item){

		echo '<option value='.$item["id"].'>'.$item["nombre"].'</option>';

		}

	}

	#OBTIENE LOS TUTORES
	#------------------------------------
	public function ObtenerTutorController(){


		$respuesta = Datos::ObtenerMaestrosModel("maestros");

		foreach($respuesta as $row => $item){

		echo '<option value='.$item["nempleado"].'>'.$item["nombre"].'</option>';

		}

	}

	#OBTIENE MAESTROS PARA EDICION DE TUTORIA
	#------------------------------------
	public function ObtenerMTutorController(){

		$respuesta = Datos::ObtenerMaestrosModel("maestros");

		foreach($respuesta as $row => $item){

		
			if ($item["nempleado"] == $respuesta["nempleado"]) {
				echo '<option value='.$item["nempleado"].'>'.$item["nombre"].'</option>';
			}

			echo '<option value='.$item["nempleado"].'>'.$item["nombre"].'</option>';

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

	public function vistaAlumnosController(){

		$respuesta = Datos::vistaAlumnosModel("alumnos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["matricula"].'</td>
				<td>'.$item["aname"].'</td>
				<td>'.$item["cname"].'</td>
				<td>'.$item["mname"].'</td>
				<td><a href="index.php?action=editar&id='.$item["matricula"].'"><button class="button radius tiny secondary">Editar</button></a></td>
				<td><a href="index.php?action=alumnos&idBorrar='.$item["matricula"].'"><button class="button radius tiny alert">Borrar</button></a></td>
			</tr>';

		}

	}

	#AÑADE LA INFORMACION DE LA DATATABLE DE ALUMNOS
	#------------------------------------
	public function vistaReportesAlumnosController(){

		$respuesta = Datos::vistaAlumnosModel("alumnos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["matricula"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["cname"].'</td>
				<td>'.$item["mname"].'</td>
			</tr>';

		}

	}

	#EDITAR ALUMNO
	#------------------------------------

	/*public function editarAlumnosController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarAlumnosModel($datosController, "alumnos");

		echo'<input type="text" value="'.$respuesta["matricula"].'" name="matriculaEditar" readonly>

			 <input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>

			 <input type="text" value="'.$respuesta["carrera"].'" name="carreraEditar" required>

			 <input type="text" value="'.$respuesta["tutor"].'" name="tutorEditar" required>

			 <input type="submit" class="button radius tiny" style="background-color: #360956; left: -1px; width: 400px;" value="Actualizar">';

	}*/

	public function editarAlumnosController(){

		$carreras = Datos::vistaCarrerasModel("carreras");

		$tutor = DatosMaestros::vistaMaestrosModel("maestros");

		$datosController = $_GET["id"];
		$respuesta = Datos::editarAlumnosModel($datosController, "alumnos");

		echo'
			<label>Matricula: </label>
			<input type="text" value="'.$respuesta["matricula"].'" name="matriculaEditar" readonly>

			<label>Nombre: </label>
			 <input type="text" value="'.$respuesta["aname"].'" name="nombreEditar" required>

			<label>Carrera: </label>
 			<select name="carreraEditar">';
				foreach($carreras as $row => $item){

					if ($item["id"] == $respuesta["acarrera"]) {
						echo '<option value='.$item["id"].' selected>'.$item["nombre"].'</option>';
					}

					echo '<option value='.$item["id"].'>'.$item["nombre"].'</option>';

				}
		echo '</select>

			<label>Tutor: </label>
 			<select name="tutorEditar">';
				foreach($tutor as $row => $item){

					if ($item["nempleado"] == $respuesta["nempleado"]) {
						echo '<option value='.$item["nempleado"].' selected>'.$item["nombre"].'</option>';
					}

					echo '<option value='.$item["nempleado"].'>'.$item["nombre"].'</option>';

				}
		echo '</select>

			 <input type="submit" class="button radius tiny" style="background-color: #360956; left: -1px; width: 400px;" value="Actualizar">';

	}

	#ACTUALIZAR ALUMNO
	#------------------------------------
	public function actualizarAlumnosController(){

		if(isset($_POST["matriculaEditar"])){

			$datosController = array( "matricula"=>$_POST["matriculaEditar"],
									  "nombre"=>$_POST["nombreEditar"],
				                      "carrera"=>$_POST["carreraEditar"],
				                      "tutor"=>$_POST["tutorEditar"]);
			
			$respuesta = Datos::actualizarAlumnosModel($datosController, "alumnos");

			if($respuesta == "success"){

				header("location:index.php?action=AlumnoEditado");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR ALUMNO
	#------------------------------------
	public function borrarAlumnosController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarAlumnoModel($datosController, "alumnos");

			if($respuesta == "success"){

				header("location:index.php?action=alumnos");
			
			}

		}

	}

}






////
?>