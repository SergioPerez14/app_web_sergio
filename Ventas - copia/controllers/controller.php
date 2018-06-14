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
								      "apellido"=>$_POST["apellido"],
								      "username"=>$_POST["username"],
								      "password"=>$_POST["password"],
								      "email"=>$_POST["email"],
								      "fecha"=>$_POST["fecha"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios",$_SESSION["id_tienda"]);

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=UsuarioRegistrado");

			}

			else{

				header("location:index.php");
			}

		}

	}

	#REGISTRO DE TIENDA
	#------------------------------------
	public function registroTiendaController(){

		if(isset($_POST["enviar"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "nombre"=>$_POST["nombre"], 
								      "direccion"=>$_POST["direccion"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroTiendaModel($datosController, "tiendas");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=TiendaRegistrada");

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
			$datosController = array( "codigo_producto"=>$_POST["codigoproducto"], 
								      "nombre"=>$_POST["nombre"],
								      "fecha"=>$_POST["fecha"],
								      "preciounitario"=>$_POST["precio"],
								      "stock"=>$_POST["stock"],
								      "id_categoria"=>$_POST["categoria"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroProductoModel($datosController, "productos",$_SESSION["id_tienda"]);

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=ProductoRegistrado");

			}

			else{

				header("location:index.php");
			}

		}

	}

	#REGISTRO DE CATEGORIAS
	#------------------------------------
	public function registroCategoriaController(){

		if(isset($_POST["enviar"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "nombre"=>$_POST["nombre"], 
								      "descripcion"=>$_POST["descripcion"],
								      "fecha"=>$_POST["fecha"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroCategoriaModel($datosController, "categorias",$_SESSION["id_tienda"]);

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=CategoriaRegistrada");

			}

			else{

				header("location:index.php");
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
				$_SESSION["apellido"] = $respuesta["apellido"];
				$_SESSION["password"] = $respuesta["password"];
				$_SESSION["email"] = $respuesta["email"];
				$_SESSION["id_usuario"] = $respuesta["id_usuario"];
				$_SESSION["id_tienda"] = $respuesta["id_tienda"];
				//$_SESSION["bandera"] = 0;
				
				$datosController2 = array( "nombre_tienda"=>$_SESSION["id_tienda"]);
				$respuesta2 = Datos::selectTiendaModel($datosController2, "tiendas");

				$_SESSION["nombre_tienda"] = $respuesta2["nombre"];

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
				if ($_SESSION["id_tienda"] == 1) {//root
					
				echo '  <!-- /.content-header -->
				    <!-- Navbar -->
				  <nav class="main-header navbar navbar-expand navbar-dark border-bottom" style="background-color: #05758c">
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
				      <li class="nav-item">
				        <a class="nav-link" href="index.php?action=help"><i class="fa fa-question-circle"></i></a>
				      </li>				      
				    </ul>

				  </nav>
				  <!-- /.navbar -->

				  <!-- Main Sidebar Container -->
				  <aside class="main-sidebar sidebar-dark-primary elevation-4">
				    <!-- Brand Logo -->
				    <a href="index.php?action=dashboard" class="brand-link" style="background-color: #05758c">
				      <img src="views/dist/img/pos.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
				           style="opacity: .8">
				      <span class="brand-text font-weight-light">Sistema de Venta</span>
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
		          <a href="" class="d-block">ID TIENDA: '.$_SESSION["id_tienda"].'</a>
		          <a href="" class="d-block">TIENDA: '.$_SESSION["nombre_tienda"].'</a>
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
		            <a href="index.php?action=tiendas" class="nav-link">
		              <i class="nav-icon fa fa-home"></i>
		              <p>
		                Tiendas
		                <i class="right fa fa-angle-left"></i>
		              </p>
		            </a>
			            <ul class="nav nav-treeview">
			              <li class="nav-item">
			                <a href="index.php?action=tiendas" class="nav-link">
			                  <i class="nav-icon fa fa-list-alt"></i>
			                  <p>Listado de Tiendas</p>
			                </a>
			            </ul>
			            <ul class="nav nav-treeview">
			              <li class="nav-item">
			                <a href="index.php?action=registrarTienda" class="nav-link">
			                  <i class="nav-icon fa fa-plus"></i>
			                  <p>Registrar Tienda</p>
			                </a>
			            </ul>
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

				}
				if ($_SESSION["id_tienda"] != 1){//empleados

					echo '  <!-- /.content-header -->
						    <!-- Navbar -->
						  <nav class="main-header navbar navbar-expand navbar-dark border-bottom" style="background-color: #05758c">
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
						      <li class="nav-item">
						        <a class="nav-link" href="index.php?action=help"><i class="fa fa-question-circle"></i></a>
						      </li>				      
						    </ul>

						  </nav>
						  <!-- /.navbar -->

						  <!-- Main Sidebar Container -->
						  <aside class="main-sidebar sidebar-dark-primary elevation-4">
						    <!-- Brand Logo -->
						    <a href="index.php?action=dashboard" class="brand-link" style="background-color: #05758c">
						      <img src="views/dist/img/pos.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
						           style="opacity: .8">
						      <span class="brand-text font-weight-light">Sistema de Venta</span>
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
				          <a href="" class="d-block">ID TIENDA: '.$_SESSION["id_tienda"].'</a>
				          <a href="" class="d-block">TIENDA: '.$_SESSION["nombre_tienda"].'</a>
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
				            <a href="index.php?action=categorias" class="nav-link">
				              <i class="nav-icon fa fa-clone"></i>
				              <p>
				                Categorias
				                <i class="right fa fa-angle-left"></i>
				              </p>
				            </a>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=categorias" class="nav-link">
					                  <i class="nav-icon fa fa-list-alt"></i>
					                  <p>Listado de Categorias</p>
					                </a>
					            </ul>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=registrarCategoria" class="nav-link">
					                  <i class="nav-icon fa fa-plus-circle"></i>
					                  <p>Registrar Categoría</p>
					                </a>
					            </ul>		            
				          </li>		          
				          <li class="nav-item">
				            <a href="index.php?action=usuarios" class="nav-link">
				              <i class="nav-icon fa fa-user"></i>
				              <p>
				                Usuarios
				                <i class="right fa fa-angle-left"></i>
				              </p>
				            </a>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=usuarios" class="nav-link">
					                  <i class="nav-icon fa fa-list-alt"></i>
					                  <p>Listado de Usuarios</p>
					                </a>
					            </ul>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=registrarUsuario" class="nav-link">
					                  <i class="nav-icon fa fa-user-plus"></i>
					                  <p>Registrar Usuario</p>
					                </a>
					            </ul>
				          </li>

				          <li class="nav-item">
				            <a href="index.php?action=ventas" class="nav-link">
				              <i class="nav-icon fa fa-shopping-cart"></i>
				              <p>
				                Ventas
				                <i class="right fa fa-angle-left"></i>
				              </p>
				            </a>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=ventas" class="nav-link">
					                  <i class="nav-icon fa fa-list-alt"></i>
					                  <p>Listado de Ventas</p>
					                </a>
					            </ul>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=registrarVenta" class="nav-link">
					                  <i class="nav-icon fa fa-user-plus"></i>
					                  <p>Registrar Venta</p>
					                </a>
					            </ul>
				          </li>

				          <li class="nav-item has-treeview">
				            <a href="index.php?action=productos" class="nav-link">
				              <i class="nav-icon fa fa-cubes"></i>
				              <p>
				                Productos
				                <i class="right fa fa-angle-left"></i>
				              </p>
				            </a>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=productos" class="nav-link">
					                  <i class="nav-icon fa fa-list-alt"></i>
					                  <p>Listado de Productos</p>
					                </a>
					            </ul>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=registrarProducto" class="nav-link">
					                  <i class="nav-icon fa fa-plus-square"></i>
					                  <p>Registrar Producto</p>
					                </a>
					            </ul>
				          </li>
				          <li class="nav-item">
				            <a href="index.php?action=historial" class="nav-link">
				              <i class="nav-icon fa fa-history"></i>
				              <p>
				                Historial
				              </p>
				            </a>
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

				}
				/*if ($_SESSION["id_tienda"] != 1 && $_SESSION["bandera"] != 0){//root con vista a tiendas

		echo '		    <!-- Navbar -->
						  <nav class="main-header navbar navbar-expand navbar-dark border-bottom" style="background-color: #05758c">
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
						      <li class="nav-item">
						        <a class="nav-link" href="index.php?action=help"><i class="fa fa-question-circle"></i></a>
						      </li>				      
						    </ul>

						  </nav>
						  <!-- /.navbar -->

						  <!-- Main Sidebar Container -->
						  <aside class="main-sidebar sidebar-dark-primary elevation-4">
						    <!-- Brand Logo -->
						    <a href="index.php?action=dashboard" class="brand-link" style="background-color: #05758c">
						      <img src="views/dist/img/pos.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
						           style="opacity: .8">
						      <span class="brand-text font-weight-light">Sistema de Venta</span>
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
				          <a href="" class="d-block">ID TIENDA: '.$_SESSION["id_tienda"].'</a>
				          <a href="" class="d-block">TIENDA: '.$_SESSION["nombre_tienda"].'</a>
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
				            <a href="index.php?action=categorias" class="nav-link">
				              <i class="nav-icon fa fa-clone"></i>
				              <p>
				                Categorias
				                <i class="right fa fa-angle-left"></i>
				              </p>
				            </a>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=categorias" class="nav-link">
					                  <i class="nav-icon fa fa-list-alt"></i>
					                  <p>Listado de Categorias</p>
					                </a>
					            </ul>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=registrarCategoria" class="nav-link">
					                  <i class="nav-icon fa fa-plus-circle"></i>
					                  <p>Registrar Categoría</p>
					                </a>
					            </ul>		            
				          </li>		          
				          <li class="nav-item">
				            <a href="index.php?action=usuarios" class="nav-link">
				              <i class="nav-icon fa fa-user"></i>
				              <p>
				                Usuarios
				                <i class="right fa fa-angle-left"></i>
				              </p>
				            </a>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=usuarios" class="nav-link">
					                  <i class="nav-icon fa fa-list-alt"></i>
					                  <p>Listado de Usuarios</p>
					                </a>
					            </ul>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=registrarUsuario" class="nav-link">
					                  <i class="nav-icon fa fa-user-plus"></i>
					                  <p>Registrar Usuario</p>
					                </a>
					            </ul>
				          </li>
				          <li class="nav-item has-treeview">
				            <a href="index.php?action=productos" class="nav-link">
				              <i class="nav-icon fa fa-cubes"></i>
				              <p>
				                Productos
				                <i class="right fa fa-angle-left"></i>
				              </p>
				            </a>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=productos" class="nav-link">
					                  <i class="nav-icon fa fa-list-alt"></i>
					                  <p>Listado de Productos</p>
					                </a>
					            </ul>
					            <ul class="nav nav-treeview">
					              <li class="nav-item">
					                <a href="index.php?action=registrarProducto" class="nav-link">
					                  <i class="nav-icon fa fa-plus-square"></i>
					                  <p>Registrar Producto</p>
					                </a>
					            </ul>
				          </li>
				          <li class="nav-item">
				            <a href="index.php?action=historial" class="nav-link">
				              <i class="nav-icon fa fa-history"></i>
				              <p>
				                Historial
				              </p>
				            </a>
				          </li>
				          <li class="nav-item has-treeview">';
	          					$_SESSION["id_tienda"] = 1;
								$datosController2 = array( "nombre_tienda"=>$_SESSION["id_tienda"]);
								$respuesta2 = Datos::selectTiendaModel($datosController2, "tiendas");
								$_SESSION["bandera"] = 0;
								$_SESSION["nombre_tienda"] = $respuesta2["nombre"];
				echo '            <a href="index.php?action=tiendas" class="nav-link">
				              <i class="nav-icon fa fa-arrow-left"></i>
				              <p>
				                Salir de Tienda
				              </p>
				            </a>
				          </li>
  				        </ul>
				      </nav>
				      <!-- /.sidebar-menu -->
				    </div>
				    <!-- /.sidebar -->
					</aside>';


				}*/
			}else{

			}

		}	

	}


	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("usuarios",$_SESSION["id_tienda"]);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id_usuario"].'</td>
				<td>'.$item["nombre"].' '.$item["apellido"].'</td>
				<td>'.$item["username"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["email"].'</td>
				<td>'.$item["fecha"].'</td>
				<td><center><a href="index.php?action=editar&id='.$item["id_usuario"].'" class="btn btn-info" title= "Editar Usuario">
                  		<i class="fa fa-edit"></i>
                	</a>
                	<button onClick="borrar();" class="btn btn-danger" title= "Borrar Usuario">
                  		<i class="fa fa-trash"></i>
                	</button></center>
                </td>
				<!--<td><a href="index.php?action=editar&id='.$item["id_usuario"].'"><button class="btn btn-block btn-secondary">Editar</button></a></td>-->
				<!--<td><a href="index.php?action=usuarios&idBorrar='.$item["id_usuario"].'"><button class="btn btn-block btn-danger">Borrar</button></a></td>-->
			</tr>';

        echo '<script type="text/javascript">
		    var password="'.$_SESSION["password"].'";
		    function borrar(){
		      swal("Ingrese su contraseña:", {
		        content: "input",
		      })
		      .then((value) => {
		          if (value==password) {
		            window.location.href = "index.php?action=usuarios&idBorrar='.$item["id_usuario"].'";
		          }else{
		            swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		          }     
		      });
		    } 
		</script>';			

		}

	}

	#VISTA DE PRODUCTOS VENDIDOS
	#------------------------------------

	public function vistaProductosVendController(){

		$respuesta = Datos::vistaProductosVendModel("productos_vendidos",$_SESSION["id_tienda"]);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id_producto_vendido"].'</td>
				<td>'.$item["id_producto"].'</td>
				<td>'.$item["cantidad"].'</td>
				<td>'.$item["p.preciounitario"].'</td>
				<td>'.$item["total"].'</td>
				<!--<td><a href="index.php?action=editar&id='.$item["id_usuario"].'"><button class="btn btn-block btn-secondary">Editar</button></a></td>-->
				<!--<td><a href="index.php?action=usuarios&idBorrar='.$item["id_usuario"].'"><button class="btn btn-block btn-danger">Borrar</button></a></td>-->
			</tr>';		

		}

	}

	#VISTA DE VENTAS
	#------------------------------------

	public function vistaVentasController(){

		$respuesta = Datos::vistaVentasModel("ventas",$_SESSION["id_tienda"]);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id_venta"].'</td>
				<td>'.$item["fecha"].'</td>
				<!--<td>'.$item["productos_vendidos"].'</td>-->
				<td>'.$item["total"].'</td>
				<td><center><a href="index.php?action=editarVenta&id='.$item["id_venta"].'" class="btn btn-info" title= "Ver detalles">
                  		<i class="fa fa-edit"></i>
                	</a>
                	<button onClick="borrar();" class="btn btn-danger" title= "Borrar Usuario">
                  		<i class="fa fa-trash"></i>
                	</button></center>
                </td>
				<!--<td><a href="index.php?action=editar&id='.$item["id_venta"].'"><button class="btn btn-block btn-secondary">Editar</button></a></td>-->
				<!--<td><a href="index.php?action=usuarios&idBorrar='.$item["id_venta"].'"><button class="btn btn-block btn-danger">Borrar</button></a></td>-->
			</tr>';

        echo '<script type="text/javascript">
		    var password="'.$_SESSION["password"].'";
		    function borrar(){
		      swal("Ingrese su contraseña:", {
		        content: "input",
		      })
		      .then((value) => {
		          if (value==password) {
		            window.location.href = "index.php?action=usuarios&idBorrar='.$item["id_venta"].'";
		          }else{
		            swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		          }     
		      });
		    } 
		</script>';			

		}

	}	

	#VISTA DE TIENDAS
	#------------------------------------

	public function vistaTiendasController(){

		$respuesta = Datos::vistaTiendasModel("tiendas",$_SESSION["id_tienda"]);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id_tienda"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["direccion"].'</td>
				<td><center><a href="index.php?action=editarTienda&id='.$item["id_tienda"].'" class="btn btn-info" title= "Editar Tienda">
                  		<i class="fa fa-edit"></i>
                	</a>
                	<button onClick="borrar();" class="btn btn-danger" title= "Borrar Tienda">
                  		<i class="fa fa-trash"></i>
                	</button></center>
                </td>
                <td><center>';

                	if ($item["status"] == 0) {
						echo '   	<a href="index.php?action=tiendas&idActTienda='.$item["id_tienda"].'" class="btn btn-danger" title= "Desactivada">
                  							<i class="fa fa-toggle-off"></i>
    	        					</a></center></td>
				               	<td><center>
				               		<a href="index.php?action=tiendas&idTienda='.$item["id_tienda"].'" class="btn btn-success disabled" title= "Entrar Tienda">
					                  		<i class="fa fa-sign-in"></i>
        							</a></center>
            					</td>';                		
                	}else{
						echo '   	<a href="index.php?action=tiendas&idDesactTienda='.$item["id_tienda"].'" class="btn btn-success" title= "Activada">
                  							<i class="fa fa-toggle-on"></i>
                					</a></center></td>
				               	<td><center>
				               		<a href="index.php?action=tiendas&idTienda='.$item["id_tienda"].'" class="btn btn-success" title= "Entrar Tienda">
					                  		<i class="fa fa-sign-in"></i>
        							</a></center>
            					</td>';                		
                	}
    echo '      <!--<td><a href="index.php?action=editar&id='.$item["id_tienda"].'"><button class="btn btn-block btn-secondary">Editar</button></a></td>-->
				<!--<td><a href="index.php?action=usuarios&idBorrar='.$item["id_tienda"].'"><button class="btn btn-block btn-danger">Borrar</button></a></td>-->
			</tr>';

        echo '<script type="text/javascript">
		    var password="'.$_SESSION["password"].'";
		    function borrar(){
		      swal("Ingrese su contraseña:", {
		        content: "input",
		      })
		      .then((value) => {
		          if (value==password) {
		            window.location.href = "index.php?action=tiendas&idBorrar='.$item["id_tienda"].'";
		          }else{
		            swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		          }     
		      });
		    } 
		</script>';


		}

	}	

	#VISTA DE MOVIMIENTOS DEL HISTORIAL
	#------------------------------------
	public function vistaMovimientosController(){

		$respuesta = Datos::vistaMovimientosModel("historial",$_SESSION["id_tienda"]);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id_historial"].'</td>
				<td>'.$item["id_producto"].'</td>
				<td>'.$item["user_id"].'</td>
				<td>'.$item["fecha"].'</td>
				<td>'.$item["nota"].'</td>
				<td>'.$item["referencia"].'</td>
				<td>'.$item["cantidad"].'</td>
				<!--<td><center><a href="index.php?action=historial&idBorrar='.$item["id_historial"].'" class="btn btn-danger" title= "Borrar Movimiento">
                  		<i class="fa fa-trash"></i>
                	</a></center>
                </td>-->
				<!--<td><a href="index.php?action=editar&id='.$item["id_historial"].'"><button class="btn btn-block btn-secondary">Editar</button></a></td>-->
				<!--<td><a href="index.php?action=usuarios&idBorrar='.$item["id_historial"].'"><button class="btn btn-block btn-danger">Borrar</button></a></td>-->
			</tr>';

		}

	}

	#VISTA DE PRODUCTOS
	#------------------------------------

	public function vistaProductosController(){

		$respuesta = Datos::vistaProductosModel("productos",$_SESSION["id_tienda"]);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id_producto"].'</td>
				<td>'.$item["codigo_producto"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["fecha"].'</td>
				<td>$'.$item["preciounitario"].'</td>
				<td>'.$item["stock"].'</td>
				<td>'.$item["id_categoria"].'</td>
				<td><center><a href="index.php?action=añadirStockProducto&id='.$item["id_producto"].'" class="btn btn-success" title= "Añadir Stock">
                  		<i class="fa fa-plus-square"></i>
                	</a>
                	<a href="index.php?action=quitarStockProducto&id='.$item["id_producto"].'" class="btn btn-danger" title= "Quitar Stock">
                  		<i class="fa fa-minus-square"></i>
                	</a></center>
                </td>
				<td><center><a href=index.php?action=editarProducto&id='.$item["id_producto"].'" class="btn btn-info" title= "Editar Producto">
                  		<i class="fa fa-edit"></i>
                	</a>
                	<button on onClick="borrar();" class="btn btn-danger" title= "Borrar Producto">
                  		<i class="fa fa-trash"></i>
                	</button></center>
                </td>

				<!--<td><a href="index.php?action=editarProducto&id='.$item["id_producto"].'"><button class="btn btn-block btn-secondary">Editar</button></a></td>-->
				<!--<td><a href="index.php?action=productos&idBorrar='.$item["id_producto"].'"><button class="btn btn-block btn-danger">Borrar</button></a></td>-->
			</tr>';

        echo '<script type="text/javascript">
		    var password="'.$_SESSION["password"].'";
		    function borrar(){
		      swal("Ingrese su contraseña:", {
		        content: "input",
		      })
		      .then((value) => {
		          if (value==password) {
		            window.location.href = "index.php?action=productos&idBorrar='.$item["id_producto"].'";
		          }else{
		            swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		          }     
		      });
		    } 
		</script>';

		}

	}

	#OBTENER EL TOTAL DE USUARIOS
	#------------------------------------

	public function totalUsuariosController(){

		$respuesta = Datos::totalUsuariosModel("usuarios",$_SESSION["id_tienda"]);
		echo count($respuesta);

	}

	#OBTENER EL TOTAL DE USUARIOS para la grafica circular del dashboard
	#------------------------------------
	public function totalUsuariosGController(){

		$respuesta = Datos::totalUsuariosModel("usuarios",$_SESSION["id_tienda"]);
		echo '<input type="text" class="knob" data-readonly="true" value='.count($respuesta).' data-width="100" data-height="100" data-fgColor="#000000">';

	}			

	#OBTENER EL TOTAL DE PRODUCTOS
	#------------------------------------
	public function totalProductosController(){

		$respuesta = Datos::totalProductosModel("productos",$_SESSION["id_tienda"]);
		echo count($respuesta);

	}

	#OBTENER EL TOTAL DE PRODUCTOS para la grafica circular de dashboard
	#------------------------------------
	public function totalProductosGController(){

		$respuesta = Datos::totalProductosModel("productos",$_SESSION["id_tienda"]);
		echo '<input type="text" class="knob" data-readonly="true" value='.count($respuesta).' data-width="100" data-height="100" data-fgColor="#000000">';

	}		

	#OBTENER EL TOTAL DE CATEGORIAS
	#------------------------------------
	public function totalCategoriasController(){

		$respuesta = Datos::totalCategoriasModel("categorias",$_SESSION["id_tienda"]);
		echo count($respuesta);

	}

	#OBTENER EL TOTAL DE MOVIMIENTOS
	#------------------------------------
	public function totalMovimientosController(){

		$respuesta = Datos::totalMovimientosModel("historial",$_SESSION["id_tienda"]);
		echo count($respuesta);

	}	

	#OBTENER EL TOTAL DE MOVIMIENTOS para la grafica en el dashboard
	#------------------------------------
	public function totalMovimientosGController(){

		$respuesta = Datos::totalMovimientosModel("historial",$_SESSION["id_tienda"]);
		echo '<input type="text" class="knob" data-readonly="true" value='.count($respuesta).' data-width="100" data-height="100" data-fgColor="#000000">';

	}	

	#VISTA DE LAS CATEGORIAS
	#------------------------------------
	public function vistaCategoriasController(){

		$respuesta = Datos::vistaCategoriasModel("categorias",$_SESSION["id_tienda"]);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id_categoria"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["descripcion"].'</td>
				<td>'.$item["fecha"].'</td>
				<td><center><a href="index.php?action=editarCategoria&id='.$item["id_categoria"].'" class="btn btn-info" title= "Editar Categoría">
                  		<i class="fa fa-edit"></i>
                	</a>
                	<button onClick="borrar();" class="btn btn-danger" title= "Borrar Categoría">
                  		<i class="fa fa-trash"></i>
                	</button></center>
                </td>
				<!--<td><a href="index.php?action=editarCategoria&id='.$item["id_categoria"].'"><button class="btn btn-block btn-secondary">Editar</button></a></td>-->
				<!--<td><a href="index.php?action=categorias&idBorrar='.$item["id_categoria"].'"><button class="btn btn-block btn-danger">Borrar</button></a></td>-->
			</tr>';

        echo '<script type="text/javascript">
		    var password="'.$_SESSION["password"].'";
		    function borrar(){
		      swal("Ingrese su contraseña:", {
		        content: "input",
		      })
		      .then((value) => {
		          if (value==password) {
		            window.location.href = "index.php?action=categorias&idBorrar='.$item["id_categoria"].'";
		          }else{
		            swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		          }     
		      });
		    } 
		</script>';

		}

	}	

	#EDITAR USUARIO
	#------------------------------------

	public function editarUsuarioController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarUsuarioModel($datosController, "usuarios");

		echo'

			<div class="card-body">
            <div class="row">
              	<div class="col-md-6">
                	<div class="form-group">
	                	<label for="exampleInputEmail1">ID</label>
	                	<input type="text" class="form-control" value="'.$respuesta["id_usuario"].'" name="idEditar" readonly>
                	</div>
                	<div class="form-group">
	                	<label for="exampleInputEmail1">Nombre</label>
	                	<input type="text" class="form-control" value="'.$respuesta["nombre"].'" name="nombreEditar" required>
                	</div>
                	<!-- /.form-group -->
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Username</label>
	                    <input type="text" class="form-control" value="'.$respuesta["username"].'" name="usernameEditar" required>
	                </div>
	                <!-- /.form-group -->
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Password</label>
	                    <input type="text" class="form-control" value="'.$respuesta["password"].'" name="passwordEditar" required>
	                </div>
              	</div>
      			<!-- /.col -->
      			<div class="col-md-6">
	                <div class="form-group">
		                <label for="exampleInputEmail1">Apellido</label>
		                <input type="text" class="form-control" value="'.$respuesta["apellido"].'" name="apellidoEditar" required>
	                </div>
	                <!-- /.form-group -->
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Email</label>
	                    <input type="email" class="form-control" value="'.$respuesta["email"].'" name="emailEditar" required>
	                </div>
	                <!-- /.form-group -->
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Fecha</label>
	                    <input type="date" class="form-control" value="'.$respuesta["fecha"].'" name="fechaEditar" required>
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

	#EDITAR TIENDA
	#------------------------------------

	public function editarTiendaController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarTiendaModel($datosController, "tiendas");

		echo'

			<div class="card-body">
            <div class="row">
              	<div class="col-md-6">
                	<div class="form-group">
	                	<label for="exampleInputEmail1">ID</label>
	                	<input type="text" class="form-control" value="'.$respuesta["id_tienda"].'" name="idEditar" readonly>
                	</div>
                	<div class="form-group">
	                	<label for="exampleInputEmail1">Nombre</label>
	                	<input type="text" class="form-control" value="'.$respuesta["nombre"].'" name="nombreEditar" required>
                	</div>
              	</div>
      			<!-- /.col -->
      			<div class="col-md-6">
	                <div class="form-group">
		                <label for="exampleInputEmail1">Direccion</label>
		                <input type="text" class="form-control" value="'.$respuesta["direccion"].'" name="direccionEditar" required>
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

	#EDITAR PRODUCTO
	#------------------------------------

	public function editarProductoController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarProductoModel($datosController, "productos");
		$respuesta2 = Datos::seleccionarCategoriasModel("categorias",$_SESSION["id_tienda"]);

		echo'
	  		<div class="card-body">
    		<div class="row">
      			<div class="col-md-6">
	                <div class="form-group">
		                <label for="exampleInputEmail1">ID de Producto</label>
		                <input type="text" class="form-control" value="'.$respuesta["id_producto"].'" name="idEditar" readonly>
	                </div>
	                <div class="form-group">
		                <label for="exampleInputEmail1">Código de Producto</label>
		                <input type="text" class="form-control" value="'.$respuesta["codigo_producto"].'" name="codigoproductoEditar" placeholder="Código de Producto">
	                </div>
	                <!-- /.form-group -->
	                <div class="form-group">
		                <label for="exampleInputEmail1">Nombre</label>
		                <input type="text" class="form-control" value="'.$respuesta["nombre"].'" name="nombreEditar" required>
	                </div>
	                <!-- /.form-group -->
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Fecha</label>
	                    <input type="date" class="form-control" value="'.$respuesta["fecha"].'" name="fechaEditar" placeholder="Fecha">
	                </div>
      			</div>
      			<!-- /.col -->
      			<div class="col-md-6">
	                <div class="form-group">
		                <label for="exampleInputEmail1">Precio</label>
		                <input type="number" class="form-control" value="'.$respuesta["preciounitario"].'" name="precioEditar" required>
	                </div>
	                <!-- /.form-group -->
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Stock</label>
	                    <input type="number" class="form-control" value="'.$respuesta["stock"].'" name="stockEditar" required>
	                </div>
	                <!-- /.form-group -->
        			<div class="form-group">
	        <!--            <label for="exampleInputPassword1">Descripción</label>
	                    <input type="text" class="form-control" name="descripcionEditar" required>-->
	                    <label for="exampleInputPassword1">Categoria</label>
	                    <!--<input type="text" class="form-control" name="categoria" placeholder="Categoria">-->
                          <select class="form-control select2" type="number" name="categoriaEditar" style="width: 100%;">';
								foreach($respuesta2 as $row => $item){
									if($respuesta["id_categoria"]==$item["id_categoria"]){
										echo '<option selected="selected">'.$respuesta["id_categoria"].' - '.$item["nombre"].'</option>';
									}else{
										echo'<option>'.$item["id_categoria"].' - '.$item["nombre"].'</option>';										
									}

								}
		            echo '</select>
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

	#AGREGAR STOCK AL PRODUCTO
	#------------------------------------

	public function añadirStockProductoController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarProductoModel($datosController, "productos");
		$respuesta2 = Datos::seleccionarCategoriasModel("categorias",$_SESSION["id_tienda"]);
		$respuesta3 = Datos::seleccionarUsuariosModel("usuarios",$_SESSION["id_tienda"]);

		echo'
	  		<div class="card-body">
    		<div class="row">
      			<div class="col-md-6">
	                <div class="form-group">
		                <label for="exampleInputEmail1">ID de Producto</label>
		                <input type="text" class="form-control" value="'.$respuesta["id_producto"].'" name="idEditar" readonly>
	                </div>
	                <div class="form-group">
		                <label for="exampleInputEmail1">Código de Producto</label>
		                <input type="text" class="form-control" value="'.$respuesta["codigo_producto"].'" name="codigoproductoEditar" readonly>
	                </div>
	                <!-- /.form-group -->
	                <div class="form-group">
		                <label for="exampleInputEmail1">Nombre</label>
		                <input type="text" class="form-control" value="'.$respuesta["nombre"].'" name="nombreEditar" readonly>
	                </div>
	                <!-- /.form-group -->
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Fecha Registro de Producto</label>
	                    <input type="date" class="form-control" value="'.$respuesta["fecha"].'" name="fechaEditar" readonly>
	                </div>
	                <div class="form-group">
		                <label for="exampleInputEmail1">Nombre Usuario</label>
						<select class="form-control select2" type="number" name="nombreUserEditar" style="width: 100%;">';
							foreach($respuesta3 as $row => $item){
									echo'<option>'.$item["id_usuario"].' - '.$item["nombre"].'</option>';	
							}
			           echo' </select>
	                </div>
	                <div class="form-group">
		                <label for="exampleInputEmail1">Fecha de Movimiento</label>
		                <input type="date" class="form-control" name="fechaMovEditar">
	                </div>
      			</div>
      			<!-- /.col -->
      			<div class="col-md-6">
	                <div class="form-group">
		                <label for="exampleInputEmail1">Precio</label>
		                <input type="number" class="form-control" value="'.$respuesta["preciounitario"].'" name="precioEditar" readonly>
	                </div>
	                <!-- /.form-group -->
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Stock</label>
	                    <input type="number" class="form-control" value="'.$respuesta["stock"].'" name="stockEditar" readonly>
	                </div>
	                <!-- /.form-group -->
        			<div class="form-group">
	        <!--            <label for="exampleInputPassword1">Descripción</label>
	                    <input type="text" class="form-control" name="descripcionEditar" required>-->
	                    <label for="exampleInputPassword1">Categoria</label>
	                    <!--<input type="text" class="form-control" name="categoria" placeholder="Categoria">-->
                          <select class="form-control select2" type="number" name="categoriaEditar" style="width: 100%;" readonly>';
								foreach($respuesta2 as $row => $item){
									if($respuesta["id_categoria"]==$item["id_categoria"]){
										echo '<option selected="selected">'.$respuesta["id_categoria"].' - '.$item["nombre"].'</option>';
									}else{
										echo'<option>'.$item["id_categoria"].' - '.$item["nombre"].'</option>';										
									}

								}
		            echo '</select>
        			</div>
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Cantidad a Agregar</label>
	                    <input type="number" class="form-control" name="stockAgregarEditar">
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Nota</label>
	                    <input type="text" class="form-control" name="notaEditar">
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Referencia</label>
	                    <input type="text" class="form-control" name="referenciaEditar">
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
          			<input type="submit" class="btn btn-block" style="background-color: #dd7d00; color: white;" name="actualizar" value="Actualizar Stock">
        			</div>
      			</div>
      			<div class="col-md-3">
      				<div></div>
      			</div>
   			</div>
			</div>';

	}

	#QUITAR STOCK AL PRODUCTO
	#------------------------------------

	public function quitarStockProductoController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarProductoModel($datosController, "productos");
		$respuesta2 = Datos::seleccionarCategoriasModel("categorias",$_SESSION["id_tienda"]);
		$respuesta3 = Datos::seleccionarUsuariosModel("usuarios",$_SESSION["id_tienda"]);

		echo'
	  		<div class="card-body">
    		<div class="row">
      			<div class="col-md-6">
	                <div class="form-group">
		                <label for="exampleInputEmail1">ID de Producto</label>
		                <input type="text" class="form-control" value="'.$respuesta["id_producto"].'" name="idEditar" readonly>
	                </div>
	                <div class="form-group">
		                <label for="exampleInputEmail1">Código de Producto</label>
		                <input type="text" class="form-control" value="'.$respuesta["codigo_producto"].'" name="codigoproductoEditar" readonly>
	                </div>
	                <!-- /.form-group -->
	                <div class="form-group">
		                <label for="exampleInputEmail1">Nombre</label>
		                <input type="text" class="form-control" value="'.$respuesta["nombre"].'" name="nombreEditar" readonly>
	                </div>
	                <!-- /.form-group -->
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Fecha Registro de Producto</label>
	                    <input type="date" class="form-control" value="'.$respuesta["fecha"].'" name="fechaEditar" readonly>
	                </div>
	                <div class="form-group">
		                <label for="exampleInputEmail1">Nombre Usuario</label>
						<select class="form-control select2" type="number" name="nombreUserEditar" style="width: 100%;">';
							foreach($respuesta3 as $row => $item){
									echo'<option>'.$item["id_usuario"].' - '.$item["nombre"].'</option>';	
							}
			           echo' </select>
	                </div>
	                <div class="form-group">
		                <label for="exampleInputEmail1">Fecha de Movimiento</label>
		                <input type="date" class="form-control" name="fechaMovEditar">
	                </div>
      			</div>
      			<!-- /.col -->
      			<div class="col-md-6">
	                <div class="form-group">
		                <label for="exampleInputEmail1">Precio</label>
		                <input type="number" class="form-control" value="'.$respuesta["preciounitario"].'" name="precioEditar" readonly>
	                </div>
	                <!-- /.form-group -->
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Stock</label>
	                    <input type="number" class="form-control" value="'.$respuesta["stock"].'" name="stockEditar" readonly>
	                </div>
	                <!-- /.form-group -->
        			<div class="form-group">
	        <!--            <label for="exampleInputPassword1">Descripción</label>
	                    <input type="text" class="form-control" name="descripcionEditar" required>-->
	                    <label for="exampleInputPassword1">Categoria</label>
	                    <!--<input type="text" class="form-control" name="categoria" placeholder="Categoria">-->
                          <select class="form-control select2" type="number" name="categoriaEditar" style="width: 100%;" readonly>';
								foreach($respuesta2 as $row => $item){
									if($respuesta["id_categoria"]==$item["id_categoria"]){
										echo '<option selected="selected">'.$respuesta["id_categoria"].' - '.$item["nombre"].'</option>';
									}else{
										echo'<option>'.$item["id_categoria"].' - '.$item["nombre"].'</option>';										
									}

								}
		            echo '</select>
        			</div>
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Cantidad a Quitar</label>
	                    <input type="number" class="form-control" name="stockAgregarEditar">
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Nota</label>
	                    <input type="text" class="form-control" name="notaEditar">
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Referencia</label>
	                    <input type="text" class="form-control" name="referenciaEditar">
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
          			<input type="submit" class="btn btn-block" style="background-color: #dd7d00; color: white;" name="actualizar" value="Actualizar Stock">
        			</div>
      			</div>
      			<div class="col-md-3">
      				<div></div>
      			</div>
   			</div>
			</div>';

	}		

	#EDITAR CATEGORIA
	#------------------------------------
	public function editarCategoriaController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarCategoriaModel($datosController, "categorias",$_SESSION["id_tienda"]);

		echo'
	  		<div class="card-body">
    		<div class="row">
      			<div class="col-md-6">
	                <div class="form-group">
		                <label for="exampleInputEmail1">ID de Categoria</label>
		                <input type="text" class="form-control" value="'.$respuesta["id_categoria"].'" name="idEditar" readonly>
	                </div>
	                <!-- /.form-group -->
	                <div class="form-group">
		                <label for="exampleInputEmail1">Nombre</label>
		                <input type="text" class="form-control" value="'.$respuesta["nombre"].'" name="nombreEditar" required>
	                </div>
	                <!-- /.form-group -->
      			</div>
      			<!-- /.col -->
      			<div class="col-md-6">
	                <div class="form-group">
		                <label for="exampleInputEmail1">Descripción</label>
		                <input type="text" class="form-control" value="'.$respuesta["descripcion"].'" name="descripcionEditar" required>
	                </div>
	                <!-- /.form-group -->
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Fecha</label>
	                    <input type="date" class="form-control" value="'.$respuesta["fecha"].'" name="fechaEditar" required>
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

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarUsuarioController(){

		if(isset($_POST["actualizar"])){

			$datosController = array( "id_usuario"=>$_POST["idEditar"],
									  "nombre"=>$_POST["nombreEditar"],
									  "apellido"=>$_POST["apellidoEditar"],
				                      "username"=>$_POST["usernameEditar"],
				                      "password"=>$_POST["passwordEditar"],
				                  	  "email"=>$_POST["emailEditar"],
				                  	  "fecha"=>$_POST["fechaEditar"]);
			
			$respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=UsuarioEditado");

			}

			else{

				echo "error";

			}

		}
	
	}

	#ACTUALIZAR TIENDA
	#------------------------------------
	public function actualizarTiendaController(){

		if(isset($_POST["actualizar"])){

			$datosController = array( "id_tienda"=>$_POST["idEditar"],
									  "nombre"=>$_POST["nombreEditar"],
				                  	  "direccion"=>$_POST["direccionEditar"]);
			
			$respuesta = Datos::actualizarTiendaModel($datosController, "tiendas");

			if($respuesta == "success"){

				header("location:index.php?action=TiendaEditada");

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
									  "codigo_producto"=>$_POST["codigoproductoEditar"],
									  "nombre"=>$_POST["nombreEditar"],
									  "fecha"=>$_POST["fechaEditar"],
									  "preciounitario"=>$_POST["precioEditar"],
									  "stock"=>$_POST["stockEditar"],
				                      "categoria"=>$_POST["categoriaEditar"]);
			
			$respuesta = Datos::actualizarProductoModel($datosController, "productos");

			if($respuesta == "success"){

				header("location:index.php?action=ProductoEditado");

			}

			else{

				echo "error";

			}

		}
	
	}

	#ACTUALIZAR AGREGADO DE STOCK
	#------------------------------------
	public function actualizaradicionStockProductoController(){

		if(isset($_POST["actualizar"])){

			$datosController = array( "id_producto"=>$_POST["idEditar"],
									  "codigo_producto"=>$_POST["codigoproductoEditar"],
									  "nombre"=>$_POST["nombreEditar"],
									  "fecha"=>$_POST["fechaEditar"],
									  "id_usuario"=>$_POST["nombreUserEditar"],
									  "fechaMov"=>$_POST["fechaMovEditar"],
									  "preciounitario"=>$_POST["precioEditar"],
									  "stock"=>$_POST["stockEditar"],
				                      "categoria"=>$_POST["categoriaEditar"],
				                  	  "cantidad"=>$_POST["stockAgregarEditar"],
				                  	  "nota"=>$_POST["notaEditar"],
				                  	  "referencia"=>$_POST["referenciaEditar"]);
			
			$respuesta = Datos::actualizaradicionStockProductoModel($datosController, "productos");

			if($respuesta == "success"){

				$respuesta2 = Datos::registroHistorialModel($datosController, "historial", $_SESSION["id_tienda"]);

				if($respuesta2 == "success"){

				header("location:index.php?action=StockAñadido");

				}else{

				echo "error";

				}

			}

			else{

				echo "error";

			}

		}
	
	}

	#ACTUALIZAR RETIRO DE STOCK
	#------------------------------------
	public function actualizarretiroStockProductoController(){

		if(isset($_POST["actualizar"])){

			$datosController = array( "id_producto"=>$_POST["idEditar"],
									  "codigo_producto"=>$_POST["codigoproductoEditar"],
									  "nombre"=>$_POST["nombreEditar"],
									  "fecha"=>$_POST["fechaEditar"],
									  "id_usuario"=>$_POST["nombreUserEditar"],
									  "fechaMov"=>$_POST["fechaMovEditar"],
									  "preciounitario"=>$_POST["precioEditar"],
									  "stock"=>$_POST["stockEditar"],
				                      "categoria"=>$_POST["categoriaEditar"],
				                  	  "cantidad"=>$_POST["stockAgregarEditar"],
				                  	  "nota"=>$_POST["notaEditar"],
				                  	  "referencia"=>$_POST["referenciaEditar"]);
			
			$respuesta = Datos::actualizarretiroStockProductoModel($datosController, "productos");

			if($respuesta == "success"){

				$respuesta2 = Datos::registroHistorialModel($datosController, "historial", $_SESSION["id_tienda"]);

				if($respuesta2 == "success"){

				header("location:index.php?action=StockReducido");

				}else{

				echo "error";

				}

			}

			else{

				echo "error";

			}

		}
	
	}	

	#ACTUALIZAR CATEGORIA
	#------------------------------------
	public function actualizarCategoriaController(){

		if(isset($_POST["actualizar"])){

			$datosController = array( "id_producto"=>$_POST["idEditar"],
									  "nombre"=>$_POST["nombreEditar"],
									  "descripcion"=>$_POST["descripcionEditar"],
				                      "fecha"=>$_POST["fechaEditar"]);
			
			$respuesta = Datos::actualizarCategoriaModel($datosController, "categorias");

			if($respuesta == "success"){

				header("location:index.php?action=CategoriaEditada");

			}

			else{

				echo "error";

			}

		}
	
	}	

	#ENTRAR TIENDA
	#------------------------------------
	public function entrarTiendaController(){

		if(isset($_GET["idTienda"])){

			//$datosController = $_GET["idEntrar"];

			$_SESSION["id_tienda"] = $_GET["idTienda"];

			$datosController2 = array( "nombre_tienda"=>$_SESSION["id_tienda"]);
			$respuesta2 = Datos::selectTiendaModel($datosController2, "tiendas");

			$_SESSION["nombre_tienda"] = $respuesta2["nombre"];

			//$_SESSION["bandera"] = 1;	

			echo $_SESSION["id_tienda"];

			header("location:index.php?action=dashboard");
			
/*			$respuesta = Datos::borrarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}
*/
		}

	}

	#ACTIVAR TIENDA
	#------------------------------------
	public function activarTiendaController(){

		if(isset($_GET["idActTienda"])){

			$datosController = array( "id_tienda"=>$_GET["idActTienda"],
						  			  "status"=>1);
			
			$respuesta = Datos::activarTiendaModel($datosController, "tiendas");

			if($respuesta == "success"){

				header("location:index.php?action=TiendaActivada");
			
			}

		}

	}

	#DESACTIVAR TIENDA
	#------------------------------------
	public function desactivarTiendaController(){

		if(isset($_GET["idDesactTienda"])){

			$datosController = array( "id_tienda"=>$_GET["idDesactTienda"],
						  			  "status"=>0);
			
			$respuesta = Datos::desactivarTiendaModel($datosController, "tiendas");

			if($respuesta == "success"){

				header("location:index.php?action=TiendaDesactivada");
			
			}

		}

	}	


	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarUsuarioModel($datosController, "usuarios",$_SESSION["id_tienda"]);

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}

		}

	}

	#BORRAR MOVIMIENTO
	#------------------------------------
	public function borrarMovimientoController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarMovimientoModel($datosController, "historial",$_SESSION["id_tienda"]);

			if($respuesta == "success"){

				header("location:index.php?action=historial");
			
			}

		}

	}

	#BORRAR PRODUCTO
	#------------------------------------
	public function borrarProductoController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarMovProModel($datosController, "historial",$_SESSION["id_tienda"]);

			if($respuesta == "success"){

				$respuesta2 = Datos::borrarProductoModel($datosController, "productos",$_SESSION["id_tienda"]);

				if($respuesta2 == "success"){

					header("location:index.php?action=productos");

				}else{

					echo "error";

				}
			
			}else{

				echo "error";

			}

		}

	}

	#BORRAR CATEGORIAS
	#------------------------------------
	public function borrarCategoriasController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarProductoModel($datosController, "productos",$_SESSION["id_tienda"]);

			//$respuesta2 = Datos::borrarCategoriaModel($datosController, "categorias");

			if($respuesta == "success" /*&& $respuesta2 == "success"*/){

				$respuesta2 = Datos::borrarCategoriaModel($datosController, "categorias",$_SESSION["id_tienda"]);

				if($respuesta2 == "success"){

					header("location:index.php?action=categorias");	

				}else{
					echo "error";
				}				
			}else{

				echo "error";

			}
		}

	}

	#BORRAR TIENDAS
	#------------------------------------
	public function borrarTiendaController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarTiendaModel($datosController, "tiendas");
			//$respuesta2 = Datos::borrarCategoriaModel($datosController, "categorias");

			if($respuesta == "success" /*&& $respuesta2 == "success"*/){

				header("location:index.php?action=tiendas");
			
			}

		}

	}

	#SELECCIONAR CATEGORIAS EXISTENTES
	#------------------------------------
	public function seleccionarCategoriasController(){

		$respuesta = Datos::seleccionarCategoriasModel("categorias", $_SESSION["id_tienda"]);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<option>'.$item["id_categoria"].' - '.$item["nombre"].'</option>';

		}

	}		

}






////
?>