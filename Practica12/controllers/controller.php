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
	public function registroUsuarioController(){

		if(isset($_POST["enviar"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "nombre"=>$_POST["nombre"], 
								      "username"=>$_POST["username"],
								      "password"=>$_POST["password"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=UsuarioRegistrado");

			}

			else{

				header("location:index.php");
			}

		}

	}

	#REGISTRO DE PRODUCTOS
	#------------------------------------
	public function registroProductoController(){

		if(isset($_POST["enviar"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "nombre"=>$_POST["nombre"], 
								      "descripcion"=>$_POST["descripcion"],
								      "cantidad"=>$_POST["cantidad"],
								      "preciounitario"=>$_POST["precio"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroProductoModel($datosController, "productos");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=ProductoRegistrado");

			}

			else{

				header("location:index.php");
			}

		}

	}

	#INGRESO DE MAESTROS
	#------------------------------------
	public function iniciarSesionController(){

		if(isset($_POST["usuarioIngreso"])){

			$datosController = array( "username"=>$_POST["usuarioIngreso"], 
								      "password"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::iniciarSesionModel($datosController, "usuarios");
			//Valiación de la respuesta del modelo para ver si es un usuario correcto.
			if($respuesta["username"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){

				session_start();

				$_SESSION["validar"] = true;

				header("location:index.php?action=usuarios");

			}

			else{

				header("location:index.php?action=fallo");

			}

		}	

	}

	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("usuarios");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id_usuario"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["username"].'</td>
				<td>'.$item["password"].'</td>
				<td><a href="index.php?action=editar&id='.$item["id_usuario"].'"><button class="button radius tiny secondary">Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id_usuario"].'"><button class="button radius tiny alert">Borrar</button></a></td>
			</tr>';

		}

	}

		#VISTA DE PRODUCTOS
	#------------------------------------

	public function vistaProductosController(){

		$respuesta = Datos::vistaProductosModel("productos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id_producto"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["descripcion"].'</td>
				<td>'.$item["cantidad"].'</td>
				<td>$'.$item["preciounitario"].'</td>
				<td><a href="index.php?action=editarProducto&id='.$item["id_producto"].'"><button class="button radius tiny secondary">Editar</button></a></td>
				<td><a href="index.php?action=productos&idBorrar='.$item["id_producto"].'"><button class="button radius tiny alert">Borrar</button></a></td>
			</tr>';

		}

	}

	#EDITAR ALUMNO
	#------------------------------------

	public function editarUsuarioController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarUsuarioModel($datosController, "usuarios");

		echo'
			<label>ID:</label>
			<input type="text" value="'.$respuesta["id_usuario"].'" name="idEditar" readonly>

			<label>Nombre:</label>
			<input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>

			<label>Username:</label>
			<input type="text" value="'.$respuesta["username"].'" name="usernameEditar" required>

			<label>Password:</label>
			<input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>

			<input type="submit" class="button radius tiny" name="actualizar" style="background-color: #360956; left: -1px; width: 400px;" value="Actualizar">';

	}

	#EDITAR PRODUCTO
	#------------------------------------

	public function editarProductoController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarProductoModel($datosController, "productos");

		echo'
			<label>ID:</label>
			<input type="text" value="'.$respuesta["id_producto"].'" name="idEditar" readonly>

			<label>Nombre:</label>
			<input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>

			<label>Descripcion:</label>
			<input type="text" value="'.$respuesta["descripcion"].'" name="descripcionEditar" required>

			<label>Cantidad:</label>
			<input type="text" value="'.$respuesta["cantidad"].'" name="cantidadEditar" required>

			<label>Precio Unitario:</label>
			<input type="text" value="'.$respuesta["preciounitario"].'" name="precioEditar" required>

			<input type="submit" class="button radius tiny" name="actualizar" style="background-color: #360956; left: -1px; width: 400px;" value="Actualizar">';

	}	

	#ACTUALIZAR ALUMNO
	#------------------------------------
	public function actualizarUsuarioController(){

		if(isset($_POST["actualizar"])){

			$datosController = array( "id_usuario"=>$_POST["idEditar"],
									  "nombre"=>$_POST["nombreEditar"],
				                      "username"=>$_POST["usernameEditar"],
				                      "password"=>$_POST["passwordEditar"]);
			
			$respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=UsuarioEditado");

			}

			else{

				echo "error";

			}

		}
	
	}

	#ACTUALIZAR PRODUCTO
	#------------------------------------
	public function actualizarProductoController(){

		if(isset($_POST["actualizar"])){

			$datosController = array( "id_producto"=>$_POST["idEditar"],
									  "nombre"=>$_POST["nombreEditar"],
									  "descripcion"=>$_POST["descripcionEditar"],
				                      "cantidad"=>$_POST["cantidadEditar"],
				                      "precio"=>$_POST["precioEditar"]);
			
			$respuesta = Datos::actualizarProductoModel($datosController, "productos");

			if($respuesta == "success"){

				header("location:index.php?action=ProductoEditado");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR ALUMNO
	#------------------------------------
	public function borrarUsuarioController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}

		}

	}

		#BORRAR ALUMNO
	#------------------------------------
	public function borrarProductoController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarProductoModel($datosController, "productos");

			if($respuesta == "success"){

				header("location:index.php?action=productos");
			
			}

		}

	}

}






////
?>