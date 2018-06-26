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

	#REGISTRO DE PAGOS - FORMA PUBLICA
	#------------------------------------
	public function registroPago2Controller(){

		if(isset($_POST["enviar"])){

			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 5000000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
			


			$datosController = array( "id_grupo"=>$_POST["IdGrupo"], 
								      "id_alumna"=>$_POST["alumna"],
								      "M_nombre"=>$_POST["nombre"],
								      "M_apellido"=>$_POST["apellido"],
								      "fecha_pago"=>$_POST["fecha"],
								      "fecha_envio"=>date("Y-m-d H:i:s"),
								      "comprobante"=>$_FILES["fileToUpload"]["name"],
								      "folio"=>$_POST["folio"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroPagoModel($datosController, "pagos");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php");

			}

			else{

				header("location: index.php?action=registrarPago2");
			}

		}

	}	

	#REGISTRO DE PAGOS - MODO ADMIN 
	#------------------------------------
	public function registroPagoController(){

		if(isset($_POST["enviar"])){

			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
			


			$datosController = array( "id_grupo"=>$_POST["IdGrupo"], 
								      "id_alumna"=>$_POST["alumna"],
								      "M_nombre"=>$_POST["nombre"],
								      "M_apellido"=>$_POST["apellido"],
								      "fecha_pago"=>$_POST["fecha"],
								      "fecha_envio"=>date("Y-m-d H:i:s"),
								      "comprobante"=>$_FILES["fileToUpload"]["name"],
								      "folio"=>$_POST["folio"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroPagoModel($datosController, "pagos");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=PagoRealizado");

			}

			else{

				header("location: index.php?action=pagos");
			}

		}

	}

	#REGISTRO DE ALUMNAS
	#------------------------------------
	public function registroAlumnaController(){

		if(isset($_POST["enviar"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "nombre"=>$_POST["nombre"], 
								      "apellido"=>$_POST["apellido"],
								      "id"=>$_POST["IdGrupo"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroAlumnasModel($datosController, "alumnas");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=AlumnaRegistrada");

			}

			else{

				header("location:index.php?action=alumnas");
			}

		}

	}

	// SELECCIONA A LAS ALUMNAS PARA  EL EVENTO ONCHANGE DEL GRUPO Y TRAER LAS ALUMNAS QUE PERTENECEN A ESE GRUPO

	public function verAlumnasController(){

			/*$respuesta = Datos::seleccionarGAlumnasModel("alumnas");

			foreach($respuesta as $row => $item){
			echo'<option value="'.$item["id_alumna"].'">'.$item["nombre"].' '.$item["apellido"].'</option>';

			}*/

			$a = Datos::vistaAlumnasModel("alumnas");
			//Variable que almacena la informacion de cada alumna en cadena
			$al ="";
			foreach ($a as $fila) {
				$al = $al . $fila["id_alumna"] . "," . $fila["nombre"] . " " . $fila["apellido"] .','. $fila["id_grupo"] . "$";
			}
			return $al;

	}	


	#REGISTRO DE GRUPOS
	#------------------------------------
	public function registroGrupoController(){

		if(isset($_POST["enviar"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "nombre"=>$_POST["nombre"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroGrupoModel($datosController, "grupos");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=GrupoRegistrado");

			}

			else{

				header("location:index.php?action=grupos");
			}

		}

	}

	#INICIO DE SESION
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
				$_SESSION["nombre"] = $respuesta["nombre"];
				$_SESSION["password"] = $respuesta["password"];
				$_SESSION["id_usuario"] = $respuesta["id_usuario"];
				$_SESSION["username"] = $respuesta["username"];
				//$_SESSION["bandera"] = 0;
				


				header("location:index.php?action=dashboard");

			}

			else{

				header("location:index.php?action=fallo");

			}

		}	

	}


	#VALIDAR SESION PARA IMPLEMENTAR SIDEBAR
	#------------------------------------
	public function checarIngresoController(){
		error_reporting(0);
		session_start();
		if(isset($_SESSION["validar"])){
			if($_SESSION["validar"]){
			
					echo '  <!-- /.content-header -->
						    <!-- Navbar -->
						  <nav class="main-header navbar navbar-expand navbar-dark border-bottom" style="background-color: #954E9E">
						    <!-- Left navbar links -->
						    <ul class="navbar-nav">
						      <li class="nav-item">
						        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
						      </li>
						      <li class="nav-item d-none d-sm-inline-block">
						        <a href="index.php?action=dashboard" class="nav-link">Inicio</a>
						      </li>
						    </ul>

						    <!-- SEARCH FORM -->
						    <form class="form-inline ml-3">
						      <div class="input-group input-group-sm">
						        <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">
						        <div class="input-group-append">
						          <button class="btn btn-navbar" type="submit">
						            <i class="fa fa-search"></i>
						          </button>
						        </div>
						      </div>
						    </form>

						    <ul class="navbar-nav ml-auto">

						      <!-- Notifications Dropdown Menu -->
						      <li class="nav-item dropdown">
						        <a class="nav-link" data-toggle="dropdown" href="#">
						          <i class="fa fa-bell-o"></i>
						          <span class="badge navbar-badge" style="background-color: #dd7d00; color: white;">';

						          $respuesta = Datos::seleccionarGrupos("grupos");
						          echo count($respuesta);
						          
						    echo '</span>
						        </a>
						        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						          <span class="dropdown-item dropdown-header">'; echo count($respuesta); echo' Notificacion(es)</span>
						          <div class="dropdown-divider"></div>';

						          $respuesta = Datos::seleccionarGrupos("grupos");
								  foreach($respuesta as $row => $item){
								  	$respuesta2 = Datos::seleccionarAlumnasXGrupo("alumnas",$item["id_grupo"]);
	  							    echo '  <a class="dropdown-item">
						            		<i class="fa fa-cubes mr-2"></i>';
					        	  	echo 'GrupoID: '.$item["id_grupo"].' tiene ';echo count($respuesta2); echo ' alumnas';
						        	echo'</a>';
						      	  }
						    echo '   <div class="dropdown-divider"></div>

						      </li>	

						      <li class="nav-item">
						        <a class="nav-link" href="index.php?action=help"><i class="fa fa-question-circle"></i></a>
						      </li>				      
						    </ul>

						  </nav>
						  <!-- /.navbar -->

						  <!-- Main Sidebar Container -->
					<aside class="main-sidebar sidebar-dark-primary elevation-4">
				    <!-- Brand Logo -->
				    <a href="index.php?action=dashboard" class="brand-link" style="background-color: #954E9E">
				      <img src="views/dist/img/he.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-6" style="opacity: .8">
				      <center><span class="brand-text font-weight-light">Bienvenidos a Danzlife</span></center>
				    </a>

				    <!-- Sidebar -->
				    <div class="sidebar">
				      <!-- Sidebar user panel (optional) -->
				      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
				        <div class="image">
				          <img src="views/dist/img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
				        </div>
				        <div class="info">
				          <a href="" class="d-block">'.$_SESSION["nombre"].'</a>
				          <a href="" class="d-block">ID USER: '.$_SESSION["id_usuario"].'</a>
				          <a href="" class="d-block">USERNAME: '.$_SESSION["username"].'</a>
				        </div>
				      </div>

				      <!-- Sidebar Menu -->
				      <nav class="mt-2">
				        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				          <!-- Add icons to the links using the .nav-icon class
				               with font-awesome or any other icon font library -->
				          <li class="nav-item">
				            <a href="index.php?action=dashboard" class="nav-link">
				              <i class="nav-icon fa fa-dashboard"></i>
				              <p>
				                Dashboard
				              </p>
				            </a>
				          </li>
				          <li class="nav-item">
				            <a href="index.php?action=grupos" class="nav-link">
				              <i class="nav-icon fa fa-clone"></i>
				              <p>
				                Grupos
				                <i class="right fa fa-angle-left"></i>
				              </p>
				            </a>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=grupos" class="nav-link">
					                  <i class="nav-icon fa fa-list-alt"></i>
					                  <p>Listado de Grupos</p>
					                </a>
					            </ul>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=registrarGrupo" class="nav-link">
					                  <i class="nav-icon fa fa-plus-circle"></i>
					                  <p>Registrar Grupo</p>
					                </a>
					            </ul>		            
				          </li>		          
				          <li class="nav-item">
				            <a href="index.php?action=alumnas" class="nav-link">
				              <i class="nav-icon fa fa-user"></i>
				              <p>
				                Alumnas
				                <i class="right fa fa-angle-left"></i>
				              </p>
				            </a>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=alumnas" class="nav-link">
					                  <i class="nav-icon fa fa-list-alt"></i>
					                  <p>Listado de Alumnas</p>
					                </a>
					            </ul>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=registrarAlumnas" class="nav-link">
					                  <i class="nav-icon fa fa-user-plus"></i>
					                  <p>Registrar Alumnas</p>
					                </a>
					            </ul>
				          </li>

				          <li class="nav-item">
				            <a href="index.php?action=pagos" class="nav-link">
				              <i class="nav-icon fa fa-credit-card"></i>
				              <p>
				                Pagos
				                <!--<i class="right fa fa-angle-left"></i>-->
				              </p>
				            </a>
					            <!--<ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=pagos" class="nav-link">
					                  <i class="nav-icon fa fa-list-alt"></i>
					                  <p>Listado de Pagos</p>
					                </a>
					            </ul>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=registrarPago" class="nav-link">
					                  <i class="nav-icon fa fa-user-plus"></i>
					                  <p>Registrar Pago</p>
					                </a>
					            </ul>-->
				          </li>	          
				          <li class="nav-item has-treeview">
				            <a href="index.php?action=salir" class="nav-link">
				              <i class="nav-icon fa fa-arrow-left"></i>
				              <p>
				                Cerrar Sesión
				              </p>
				            </a>
				          </li>
				        </ul>
				      </nav>
				      <!-- /.sidebar-menu -->
				    </div>
				    <!-- /.sidebar -->
					</aside>';
				
			}else{

			}

		}else{
			
		}

	}


	#VISTA DE ALUMNAS
	#------------------------------------

	public function vistaAlumnasController(){

		$respuesta = Datos::vistaAlumnasModel("alumnas");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){

				echo'<tr>
						<td>'.$item["id_alumna"].'</td>
						<td>'.$item["nombre"].' '.$item["apellido"].'</td>
						<td>'.$item["id_grupo"].'</td>
						<td><center><a href="index.php?action=editar&id='.$item["id_alumna"].'" class="btn btn-info" title= "Editar Alumna">
				                  		<i class="fa fa-edit"></i>
				                	</a>
				                	<button onClick="borrar('.$item["id_alumna"].');" class="btn btn-danger" title= "Borrar Alumna">
		                  				<i class="fa fa-trash"></i>
		                		  	</button>
                		  	</center>
		                </td>
						<!--<td><a href="index.php?action=editar&id='.$item["id_usuario"].'"><button class="btn btn-block btn-secondary">Editar</button></a></td>-->
						<!--<td><a href="index.php?action=usuarios&idBorrar='.$item["id_usuario"].'"><button class="btn btn-block btn-danger">Borrar</button></a></td>-->
					</tr>';
				}

	        echo '<script type="text/javascript">
				    var password="'.$_SESSION["password"].'";
				    function borrar(id){
				      swal("Ingrese su contraseña:", {
				        content: "input",
				      })
				      .then((value) => {
				          if (value==password) {
				            window.location.href = "index.php?action=alumnas&idBorrar="+id;
				          }else{
				            swal("Contraseña Incorrecta", "Intente de nuevo", "error");
				          }     
				      });
				    } 
				</script>';	

		

	}

	// VISTA DE PAGOS EN MODO ADMIN

	public function vistaPagosController(){

		$respuesta = Datos::vistaPagosModel("pagos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){

				echo'<tr>
						<td>'.$item["id_pago"].'</td>
						<td>'.$item["nombre"].' '.$item["apellido"].'</td>
						<td>'.$item["id_grupo"].'</td>
						<td>'.$item["M_nombre"].' '.$item["M_apellido"].'</td>
						<td>'.$item["fecha_pago"].'</td>
						<td>'.$item["fecha_envio"].'</td>
						<td>'.$item["folio"].'</td>
						<td><center><a href="uploads/'.$item["comprobante"].'" class="btn" style="background-color: #dd7d00; color: white;" title= "Ver Imagen">
				                  		<i class="fa fa-image"></i>
				                	</a>
									<a href="index.php?action=editarPago&id='.$item["id_pago"].'" class="btn btn-info" title= "Editar Pago">
				                  		<i class="fa fa-edit"></i>
				                	</a>
				                	<button onClick="borrar('.$item["id_pago"].');" class="btn btn-danger" title= "Borrar Pago">
		                  				<i class="fa fa-trash"></i>
		                		  	</button>
                		  	</center>
		                </td>
						<!--<td><a href="index.php?action=editar&id='.$item["id_usuario"].'"><button class="btn btn-block btn-secondary">Editar</button></a></td>-->
						<!--<td><a href="index.php?action=usuarios&idBorrar='.$item["id_usuario"].'"><button class="btn btn-block btn-danger">Borrar</button></a></td>-->
					</tr>';
				}

	        echo '<script type="text/javascript">
				    var password="'.$_SESSION["password"].'";
				    function borrar(id){
				      swal("Ingrese su contraseña:", {
				        content: "input",
				      })
				      .then((value) => {
				          if (value==password) {
				            window.location.href = "index.php?action=pagos&idBorrar="+id;
				          }else{
				            swal("Contraseña Incorrecta", "Intente de nuevo", "error");
				          }     
				      });
				    } 
				</script>';	

		

	}

	//VISTA DE PAGOS DE FORMA PUBLICA

	public function vistaPPagosController(){

		$respuesta = Datos::vistaPagosModel("pagos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){

				echo'<tr>
						<td>'.$item["id_pago"].'</td>
						<td>'.$item["nombre"].' '.$item["apellido"].'</td>
						<td>'.$item["id_grupo"].'</td>
						<td>'.$item["M_nombre"].' '.$item["M_apellido"].'</td>
						<td>'.$item["fecha_pago"].'</td>
						<td>'.$item["fecha_envio"].'</td>
						<!--<td><a href="index.php?action=editar&id='.$item["id_usuario"].'"><button class="btn btn-block btn-secondary">Editar</button></a></td>-->
						<!--<td><a href="index.php?action=usuarios&idBorrar='.$item["id_usuario"].'"><button class="btn btn-block btn-danger">Borrar</button></a></td>-->
					</tr>';
				}	

	}

	//VISTA DE LUGARES DE FORMA PUBLICA

	public function vistaPPago2Controller(){

		$respuesta = Datos::vistaPagos2Model("pagos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		$id = 1;

		foreach($respuesta as $row => $item){

				echo'<tr>
						<td>'.$id.'</td>
						<td>'.$item["id_pago"].'</td>
						<td>'.$item["nombre"].' '.$item["apellido"].'</td>
						<td>'.$item["id_grupo"].'</td>
						<td>'.$item["M_nombre"].' '.$item["M_apellido"].'</td>
						<td>'.$item["fecha_pago"].'</td>
						<td>'.$item["fecha_envio"].'</td>
						<td>'.$item["folio"].'</td>
						<!--<td><a href="index.php?action=editar&id='.$item["id_usuario"].'"><button class="btn btn-block btn-secondary">Editar</button></a></td>-->
						<!--<td><a href="index.php?action=usuarios&idBorrar='.$item["id_usuario"].'"><button class="btn btn-block btn-danger">Borrar</button></a></td>-->
					</tr>';
					$id++;
				}	

	}

	#OBTENER EL TOTAL DE USUARIOS
	#------------------------------------

	public function totalUsuariosController(){

		$respuesta = Datos::totalUsuariosModel("usuarios");
		echo count($respuesta);

	}		

	#OBTENER EL TOTAL DE PAGOS
	#------------------------------------
	public function totalPagosController(){

		$respuesta = Datos::totalPagosModel("pagos");
		echo count($respuesta);

	}	

	#OBTENER EL TOTAL DE GRUPOS
	#------------------------------------
	public function totalGruposController(){

		$respuesta = Datos::totalGruposModel("grupos");
		echo count($respuesta);

	}

	#OBTENER EL TOTAL DE ALUMNAS
	#------------------------------------
	public function totalAlumnasController(){

		$respuesta = Datos::totalAlumnasModel("alumnas");
		echo count($respuesta);

	}	

	#VISTA DE LOS GRUPOS
	#------------------------------------
	public function vistaGruposController(){

		$respuesta = Datos::vistaGruposModel("grupos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id_grupo"].'</td>
				<td>'.$item["nombre"].'</td>
				<td><center><a href="index.php?action=editarGrupo&id='.$item["id_grupo"].'" class="btn btn-info" title= "Editar Grupo">
                  		<i class="fa fa-edit"></i>
                	</a>
                	<button onClick="borrar('.$item["id_grupo"].');" class="btn btn-danger" title= "Borrar Grupo">
                  		<i class="fa fa-trash"></i>
                	</button></center>
                </td>
				<!--<td><a href="index.php?action=editarCategoria&id='.$item["id_categoria"].'"><button class="btn btn-block btn-secondary">Editar</button></a></td>-->
				<!--<td><a href="index.php?action=categorias&idBorrar='.$item["id_categoria"].'"><button class="btn btn-block btn-danger">Borrar</button></a></td>-->
			</tr>';

		}

        echo '<script type="text/javascript">
			    var password="'.$_SESSION["password"].'";
			    function borrar(id){
			      swal("Ingrese su contraseña:", {
			        content: "input",
			      })
			      .then((value) => {
			          if (value==password) {
			            window.location.href = "index.php?action=grupos&idBorrar="+id;
			          }else{
			            swal("Contraseña Incorrecta", "Intente de nuevo", "error");
			          }     
			      });
			    } 
			</script>';	

	}	

	#EDITAR PAGO
	#------------------------------------

public function editarPagoController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarPagoModel($datosController, "pagos");
		$respuesta2 = Datos::seleccionarGruposModel("grupos");

		echo'

			<div class="card-body">
            <div class="row">
              	<div class="col-md-6">
                	<div class="form-group">
	                	<label for="exampleInputEmail1">ID Pago</label>
	                	<input type="text" class="form-control" value="'.$respuesta["id_pago"].'" name="idEditar" readonly>
                	</div>
                	<div class="form-group">
	                	<label for="exampleInputEmail1">ID Alumna</label>
	                	<input type="text" class="form-control" value="'.$respuesta["id_alumna"].'" name="idAEditar" readonly>
                	</div>
                	<div class="form-group">
	                	<label for="exampleInputEmail1">Grupo</label>
	                	<input type="text" class="form-control" value="'.$respuesta["id_grupo"].'" name="grupoEditar" readonly>
                	</div>                  	
        			<!--<div class="form-group">
	                    <label for="exampleInputPassword1">Grupo</label>
                          <select class="form-control select2" type="number" name="grupoEditar" style="width: 100%;">-->';
								/*foreach($respuesta2 as $row => $item){
									if($respuesta["id_grupo"]==$item["id_grupo"]){
										echo '<option value="'.$item["id_grupo"].'" selected="selected">'.$item["id_grupo"].' - '.$item["nombre"].'</option>';
									}else{
										echo'<option value="'.$item["id_grupo"].'" >'.$item["id_grupo"].' - '.$item["nombre"].'</option>';										
									}

								}*/
		            /*echo '</select>
        			</div>*/
			echo '  <div class="form-group">
	                    <label for="exampleInputFile">Imagen</label>
	                    <div class="input-group">
	                      <div class="custom-file">
	                        <input type="file" class="custom-file-input" id="exampleInputFile" name="fileToUpload" id="fileToUpload">
	                        <label class="custom-file-label" for="exampleInputFile">Escoger archivo</label>
	                      </div>
	                    </div>
	                </div>
              	</div>
      			<!-- /.col -->
      			<div class="col-md-6">
                	<div class="form-group">
	                	<label for="exampleInputEmail1">Nombre</label>
	                	<input type="text" class="form-control" value="'.$respuesta["M_nombre"].'" name="nombreEditar" required>
                	</div>      			
	                <div class="form-group">
		                <label for="exampleInputEmail1">Apellido</label>
		                <input type="text" class="form-control" value="'.$respuesta["M_apellido"].'" name="apellidoEditar" required>
	                </div>
                	<div class="form-group">
	                	<label for="exampleInputEmail1">Folio</label>
	                	<input type="text" class="form-control" value="'.$respuesta["folio"].'" name="folio" required>
                	</div>      			
	                <div class="form-group">
		                <label for="exampleInputEmail1">Fecha de Pago</label>
		                <input type="date" class="form-control" value="'.$respuesta["fecha_pago"].'" name="fechaEditar" required>
	                </div>	                
      			</div>
      			<!-- /.col -->
    		</div>
    		<!-- /.row -->
  		</div>
		<!-- /.card-body -->
		<div class="card-body">
    		<div class="row">
      			<div class="col-md-3">
      				<div></div>
      			</div>
		            <div class="col-md-6">
	              	<div class="card-footer">
	                  <input type="submit" class="btn btn-block" style="background-color: #dd7d00; color: white;" name="actualizar" value="Actualizar">
	                </div>
      			</div>
            	<div class="col-md-3">
              		<div></div>
        		</div>
   			</div>
			</div>'; 

	}	

//EDITAR ALUMNA
	public function editarAlumnaController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarAlumnaModel($datosController, "alumnas");
		$respuesta2 = Datos::seleccionarGruposModel("grupos");

		echo'

			<div class="card-body">
            <div class="row">
              	<div class="col-md-6">
                	<div class="form-group">
	                	<label for="exampleInputEmail1">ID</label>
	                	<input type="text" class="form-control" value="'.$respuesta["id_alumna"].'" name="idEditar" readonly>
                	</div>
        			<div class="form-group">
	                    <label for="exampleInputPassword1">Grupo</label>
                          <select class="form-control select2" type="number" name="grupoEditar" style="width: 100%;">';
								foreach($respuesta2 as $row => $item){
									if($respuesta["id_grupo"]==$item["id_grupo"]){
										echo '<option value="'.$item["id_grupo"].'" selected="selected">'.$item["nombre"].'</option>';
									}else{
										echo'<option value="'.$item["id_grupo"].'" >'.$item["nombre"].'</option>';										
									}

								}
		            echo '</select>
        			</div>	
              	</div>
      			<!-- /.col -->
      			<div class="col-md-6">
                	<div class="form-group">
	                	<label for="exampleInputEmail1">Nombre</label>
	                	<input type="text" class="form-control" value="'.$respuesta["nombre"].'" name="nombreEditar" required>
                	</div>      			
	                <div class="form-group">
		                <label for="exampleInputEmail1">Apellido</label>
		                <input type="text" class="form-control" value="'.$respuesta["apellido"].'" name="apellidoEditar" required>
	                </div>                
      			</div>
      			<!-- /.col -->
    		</div>
    		<!-- /.row -->
  		</div>
		<!-- /.card-body -->
		<div class="card-body">
    		<div class="row">
      			<div class="col-md-3">
      				<div></div>
      			</div>
		            <div class="col-md-6">
	              	<div class="card-footer">
	                  <input type="submit" class="btn btn-block" style="background-color: #dd7d00; color: white;" name="actualizar" value="Actualizar">
	                </div>
      			</div>
            	<div class="col-md-3">
              		<div></div>
        		</div>
   			</div>
			</div>'; 

	}	

	#EDITAR GRUPO
	#------------------------------------
	public function editarGrupoController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarGrupoModel($datosController, "grupos");

		echo'
	  		<div class="card-body">
    		<div class="row">
      			<div class="col-md-6">
	                <div class="form-group">
		                <label for="exampleInputEmail1">ID de Categoria</label>
		                <input type="text" class="form-control" value="'.$respuesta["id_grupo"].'" name="idEditar" readonly>
	                </div>
	                <!-- /.form-group -->
      			</div>
      			<!-- /.col -->
      			<div class="col-md-6">
	                <div class="form-group">
		                <label for="exampleInputEmail1">Nombre</label>
		                <input type="text" class="form-control" value="'.$respuesta["nombre"].'" name="nombreEditar" required>
	                </div>
	                <!-- /.form-group -->
      			</div>
      			<!-- /.col -->
    		</div>
    		<!-- /.row -->
  		</div>
		<!-- /.card-body -->
		<div class="card-body">
    		<div class="row">
            	<div class="col-md-3">
              		<div></div>
              	</div>
          			<div class="col-md-6">
      				<div class="card-footer">
          			<input type="submit" class="btn btn-block" style="background-color: #dd7d00; color: white;" name="actualizar" value="Actualizar">
        			</div>
      			</div>
      			<div class="col-md-3">
      				<div></div>
      			</div>
   			</div>
			</div>';

	}

	#ACTUALIZAR PAGO
	#------------------------------------

	public function actualizarPagoController(){

		if(isset($_POST["actualizar"])){

			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}

			$datosController = array( "id_pago"=>$_POST["idEditar"],
									  "id_alumna"=>$_POST["idAEditar"],
									  "id_grupo"=>$_POST["grupoEditar"],
									  "M_nombre"=>$_POST["nombreEditar"],
									  "M_apellido"=>$_POST["apellidoEditar"],
									  "comprobante"=>$_FILES["fileToUpload"]["name"],
									  "folio"=>$_POST["folio"],
									  "fecha_pago"=>$_POST["fechaEditar"],
				                      "fecha_envio"=>date("Y-m-d H:i:s"));
			
			$respuesta = Datos::actualizarPagoModel($datosController, "pagos");

			if($respuesta == "success"){

				header("location:index.php?action=PagoEditado");

			}

			else{

				echo "error";

			}

		}
	
	}

//ACTUALIZAR ALUMNA
	public function actualizarAlumnaController(){

		if(isset($_POST["actualizar"])){

			$datosController = array( "id_alumna"=>$_POST["idEditar"],
									  "nombre"=>$_POST["nombreEditar"],
									  "apellido"=>$_POST["apellidoEditar"],
				                      "id_grupo"=>$_POST["grupoEditar"]);
			
			$respuesta = Datos::actualizarAlumnaModel($datosController, "alumnas");

			if($respuesta == "success"){

				header("location:index.php?action=AlumnaEditada");

			}

			else{

				echo "error";

			}

		}
	
	}

	#ACTUALIZAR GRUPO
	#------------------------------------
	public function actualizarGrupoController(){

		if(isset($_POST["actualizar"])){

			$datosController = array( "id_grupo"=>$_POST["idEditar"],
									  "nombre"=>$_POST["nombreEditar"]);
			
			$respuesta = Datos::actualizarGruposModel($datosController, "grupos");

			if($respuesta == "success"){

				header("location:index.php?action=GrupoEditado");

			}

			else{

				echo "error";

			}

		}
	
	}


	#BORRAR ALUMNA
	#------------------------------------
	public function borrarAlumnaController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarAlumnaModel($datosController, "alumnas");

			if($respuesta == "success"){

				header("location:index.php?action=alumnas");
			
			}

		}

	}

	#BORRAR PAGO
	#------------------------------------
	public function borrarPagosController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarPagoModel($datosController, "pagos");

			if($respuesta == "success"){

				header("location:index.php?action=pagos");
			
			}

		}

	}	

	#BORRAR GRUPO
	#------------------------------------
	public function borrarGruposController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta2 = Datos::borrarGrupoModel($datosController, "grupos");

			if($respuesta2 == "success"){

				header("location:index.php?action=grupos");				
			
			}else{

				echo "error";

			}
		}

	}

	#SELECCIONAR GRUPOS EXISTENTES
	#------------------------------------
	public function seleccionarGruposController(){

		$respuesta = Datos::seleccionarGruposModel("grupos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		
		echo'<option value="'.$item["id_grupo"].'">'.$item["id_grupo"].' - '.$item["nombre"].'</option>';

		}



	}		

}
////
?>