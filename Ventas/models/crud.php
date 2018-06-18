<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

//heredar la clase conexion de conexion.php para poder utilizar "Conexion" del archivo conexion.php.
// Se extiende cuando se requiere manipuar una funcion, en este caso se va a  manipular la función "conectar" del models/conexion.php:
class Datos extends Conexion{

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroUsuarioModel($datosModel, $tabla, $tienda){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, apellido, username, password, email, fecha, id_tienda) VALUES (:nombre,:apellido,:username,:password,:email,:fecha, $tienda)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroTiendaModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, direccion) VALUES (:nombre,:direccion)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datosModel["direccion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#REGISTRO DE HISTORIAL
	#------------------------------------

	public function registroHistorialModel($datosModel, $tabla, $tienda){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_producto, user_id, fecha, nota, referencia, cantidad, id_tienda) VALUES (:id_producto,:id_usuario,:fecha,:nota,:referencia,:cantidad, $tienda)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":id_producto", $datosModel["id_producto"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datosModel["fechaMov"], PDO::PARAM_STR);
		$stmt->bindParam(":nota", $datosModel["nota"], PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $datosModel["referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datosModel["cantidad"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#REGISTRO DE PRODUCTOS
	#-------------------------------------
	public function registroProductoModel($datosModel, $tabla,$tienda){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (codigo_producto, nombre, fecha, preciounitario, stock, id_categoria, id_tienda) VALUES (:codigoproducto,:nombre,:fecha,:preciounitario,:stock,:idcategoria,$tienda)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":codigoproducto", $datosModel["codigo_producto"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":preciounitario", $datosModel["preciounitario"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datosModel["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":idcategoria", $datosModel["id_categoria"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#REGISTRO DE CATEGORIA
	#------------------------------------
	public function registroCategoriaModel($datosModel, $tabla,$tienda){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, descripcion, fecha, id_tienda) VALUES (:nombre,:descripcion,:fecha,$tienda)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#REGISTRO DE VENTAS
	#------------------------------------
	public function registroVentaModel($datosModel, $tabla,$tienda){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (fecha, total, id_tienda) VALUES (:fecha,:total,$tienda)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":fecha", $datosModel["fechaVenta"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datosModel["total"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#REGISTRO DE VENTAS
	#------------------------------------
	public function registroProductosVendidosModel($datosModel, $tabla,$tienda){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_producto, cantidad, total, id_venta, id_tienda) VALUES (:id_producto, :cantidad, :total, :id_venta, $tienda)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":id_producto", $datosModel["id_producto"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datosModel["cantidadVenta"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datosModel["total"], PDO::PARAM_STR);
		$stmt->bindParam(":id_venta", $datosModel["id_venta"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}	

	#INGRESO DE SESION
	#-------------------------------------
	public function iniciarSesionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT username, password, id_usuario, nombre, apellido, email, id_tienda FROM $tabla WHERE username = :username");	
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

	}

	#INGRESO DE SESION
	#-------------------------------------
	public function selectTiendaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE id_tienda = :id");	
		$stmt->bindParam(":id", $datosModel["nombre_tienda"], PDO::PARAM_STR);
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

	}


	#VISTA USUARIOS
	#-------------------------------------

	public function vistaUsuariosModel($tabla, $tienda){

		$stmt = Conexion::conectar()->prepare("SELECT id_usuario, nombre, apellido, username, password, email, fecha, id_tienda FROM $tabla WHERE id_tienda = $tienda");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#VISTA PRODUCTOS VENDIDOS
	#-------------------------------------

	public function vistaProductosVendidosModel($tabla, $tienda){

		$stmt = Conexion::conectar()->prepare("SELECT id_producto_vendido, id_producto, cantidad, total, id_venta, id_tienda FROM $tabla WHERE id_tienda = $tienda");	

		//$stmt = Conexion::conectar()->prepare("SELECT id_producto_vendido, t.id_producto, t.cantidad, t.total, t.id_venta, p.preciounitario FROM $tabla as t INNER JOIN productos as p on p.id_producto = t.id_producto INNER JOIN ventas as v on t.id_venta = :id WHERE t.id_tienda = $tienda");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}	

	#VISTA DETALLES PRODUCTOS VENDIDOS
	#-------------------------------------

	public function vistaProductosVendModel($tabla, $tienda, $datosModel){

		$stmt = Conexion::conectar()->prepare("SELECT id_producto_vendido, id_producto, cantidad, total, id_venta, id_tienda FROM $tabla WHERE id_tienda = $tienda and id_venta = :id");	

		//$stmt = Conexion::conectar()->prepare("SELECT id_producto_vendido, t.id_producto, t.cantidad, t.total, t.id_venta, p.preciounitario FROM $tabla as t INNER JOIN productos as p on p.id_producto = t.id_producto INNER JOIN ventas as v on t.id_venta = :id WHERE t.id_tienda = $tienda");	
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}	

	#VISTA VENTAS
	#-------------------------------------

	public function vistaVentasModel($tabla, $tienda){

		$stmt = Conexion::conectar()->prepare("SELECT id_venta, fecha, total, id_tienda FROM $tabla WHERE id_tienda = $tienda");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}	

	#VISTA DE MOVIMIENTOS
	#------------------------------------
	public function vistaMovimientosModel($tabla,$tienda){

		$stmt = Conexion::conectar()->prepare("SELECT id_historial, id_producto, user_id, fecha, nota, referencia, cantidad FROM $tabla WHERE id_tienda = $tienda");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}	

	#VISTA PRODUCTOS
	#-------------------------------------

	public function vistaProductosModel($tabla,$tienda){

		$stmt = Conexion::conectar()->prepare("SELECT id_producto, codigo_producto, nombre, fecha, preciounitario, stock, id_categoria FROM $tabla WHERE id_tienda = $tienda");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#VISTA CATEGORIAS
	#-------------------------------------

	public function vistaCategoriasModel($tabla,$tienda){

		$stmt = Conexion::conectar()->prepare("SELECT id_categoria, nombre, descripcion, fecha FROM $tabla WHERE id_tienda = $tienda");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}	

	#VISTA TIENDAS
	#-------------------------------------

	public function vistaTiendasModel($tabla,$id){

		$stmt = Conexion::conectar()->prepare("SELECT id_tienda, nombre, direccion, status FROM $tabla WHERE id_tienda != $id");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}	

	#TOTAL USUARIOS
	#-------------------------------------

	public function totalUsuariosModel($tabla,$tienda){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_tienda = $tienda");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}

	#TOTAL PRODUCTOS
	#-------------------------------------

	public function totalProductosModel($tabla,$tienda){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_tienda = $tienda");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}

	#TOTAL CATEGORIAS
	#-------------------------------------

	public function totalCategoriasModel($tabla,$tienda){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_tienda = $tienda");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}	

	#TOTAL MOVIMIENTOS
	#-------------------------------------

	public function totalMovimientosModel($tabla,$tienda){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_tienda = $tienda");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}		

	#EDITAR USUARIO
	#-------------------------------------

	public function editarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id_usuario, nombre, apellido, username, password, email, fecha FROM $tabla WHERE id_usuario = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#EDITAR TIENDA
	#-------------------------------------

	public function editarTiendaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id_tienda, nombre, direccion, status FROM $tabla WHERE id_tienda = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}	

	#EDITAR PRODUCTO
	#-------------------------------------

	public function editarProductoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id_producto, codigo_producto, nombre, fecha, preciounitario, stock, id_categoria FROM $tabla WHERE id_producto = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#EDITAR CATEGORIA
	#-------------------------------------

	public function editarCategoriaModel($datosModel, $tabla,$tienda){

		$stmt = Conexion::conectar()->prepare("SELECT id_categoria, nombre, descripcion, fecha FROM $tabla WHERE id_categoria = :id and id_tienda = $tienda");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}	

	#ACTUALIZAR USUARIO
	#-------------------------------------

	public function actualizarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, username = :username, password = :password, email = :email, fecha = :fecha WHERE id_usuario = :id");

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id_usuario"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#ACTUALIZAR USUARIO
	#-------------------------------------

	public function actualizarTiendaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, direccion = :direccion WHERE id_tienda = :id");

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datosModel["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id_tienda"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}	

	#ACTUALIZAR Stock
	#-------------------------------------
/*
	public function actualizarProductoModel2($cantidad, $tabla,$id){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET stock = stock - $cantidadVenta WHERE id_producto = $id");

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}	*/

	#ACTUALIZAR PRODUCTO
	#-------------------------------------

	public function actualizarProductoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo_producto = :codigo_producto, nombre = :nombre, fecha = :fecha, preciounitario = :preciounitario, stock = :stock, id_categoria = :id_categoria WHERE id_producto = :id");

		$stmt->bindParam(":codigo_producto", $datosModel["codigo_producto"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":preciounitario", $datosModel["preciounitario"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datosModel["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":id_categoria", $datosModel["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id_producto"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#ACTUALIZAR LA ADICION DE STOCK
	#------------------------------------
	public function actualizaradicionStockProductoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET stock = :stock + :cantidad WHERE id_producto = :id");

		$stmt->bindParam(":stock", $datosModel["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datosModel["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id_producto"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#ACTUALIZAR REDUCCION DE STOCK
	#------------------------------------
	public function actualizarretiroStockProductoModel($datosModel, $tabla){


		if ($datosModel["cantidad"] > $datosModel["stock"]) {
			
			echo '<script type="text/javascript">
				  	alert("La cantidad ingresada es mayor al stock disponible");
				  </script>';

		}else{

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET stock = :stock - :cantidad WHERE id_producto = :id");

			$stmt->bindParam(":stock", $datosModel["stock"], PDO::PARAM_STR);
			$stmt->bindParam(":cantidad", $datosModel["cantidad"], PDO::PARAM_STR);
			$stmt->bindParam(":id", $datosModel["id_producto"], PDO::PARAM_INT);

			if($stmt->execute()){

				return "success";

			}

			else{

				return "error";

			}

			$stmt->close();
		}

	}	

	#ACTUALIZAR CATEGORIA
	#-------------------------------------

	public function actualizarCategoriaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, descripcion = :descripcion, fecha = :fecha WHERE id_categoria = :id");

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id_producto"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#ACTIVAR TIENDA
	#------------------------------------
	public function activarTiendaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET status = :status WHERE id_tienda = :id");
		$stmt->bindParam(":status", $datosModel["status"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datosModel["id_tienda"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#DESACTIVAR TIENDA
	#------------------------------------
	public function desactivarTiendaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET status = :status WHERE id_tienda = :id");
		$stmt->bindParam(":status", $datosModel["status"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datosModel["id_tienda"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}	

	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioModel($datosModel, $tabla, $tienda){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario = :id and id_tienda = $tienda");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#BORRAR PRODUCTO
	#------------------------------------
	public function borrarProductoModel($datosModel, $tabla,$tienda){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_producto = :id and id_tienda = $tienda");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#BORRAR MOVIMIENTO
	#------------------------------------
	public function borrarMovProModel($datosModel, $tabla, $tienda){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_producto = :id and id_tienda = $tienda");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#BORRAR CATEGORIA
	#------------------------------------
	public function borrarCategoriaModel($datosModel, $tabla,$tienda){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_categoria = :id and id_tienda = $tienda");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}	

	#BORRAR TIENDA
	#------------------------------------
	public function borrarTiendaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_tienda = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#BORRAR TIENDA
	#------------------------------------
	public function borrarVentaModel($datosModel, $tabla, $tienda){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_venta = :id and id_tienda = $tienda");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}		

	#BORRAR MOVIMIENTO
	#------------------------------------
	public function borrarMovimientoModel($datosModel, $tabla, $tienda){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_historial = :id and id_tienda = $tienda");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#OBTENER LAS CATEGORIAS
	#------------------------------------
	public function seleccionarCategoriasModel($tabla,$tienda){

		$stmt = Conexion::conectar()->prepare("SELECT id_categoria,nombre FROM $tabla WHERE id_tienda = $tienda");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}	

	#OBTENER LOS USUARIOS
	#------------------------------------
	public function seleccionarUsuariosModel($tabla,$tienda){

		$stmt = Conexion::conectar()->prepare("SELECT id_usuario,nombre FROM $tabla WHERE id_tienda = $tienda");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}	

	#OBTENER LOS PRODUCTOS
	#------------------------------------
	public function seleccionarProductosModel($tabla,$tienda){

		$stmt = Conexion::conectar()->prepare("SELECT id_producto,nombre,stock,preciounitario FROM $tabla WHERE id_tienda = $tienda");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}	

	#OBTENER LOS PRODUCTOS
	#------------------------------------
	/*public function seleccionarProductosVentaModel($tabla,$tienda,$id){

		$stmt = Conexion::conectar()->prepare("SELECT id_producto,nombre,stock,preciounitario FROM $tabla WHERE id_tienda = $tienda and id_producto = $id");	
		$stmt->execute();
		return $stmt->fetchALL();
		$stmt->close();

	}	*/

	#OBTENER LOS PRODUCTOS
	#------------------------------------
	public function seleccionarProdLowStockModel($tabla,$tienda){

		$stmt = Conexion::conectar()->prepare("SELECT id_producto,nombre,stock,preciounitario FROM $tabla WHERE id_tienda = $tienda and stock < 5");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}	

	#OBTENER LOS PRODUCTOS
	#------------------------------------
	public function seleccionarProductos2Model($tabla,$tienda,$datosModel){

		$stmt = Conexion::conectar()->prepare("SELECT preciounitario FROM $tabla WHERE id_tienda = $tienda and id_producto = :id");
		$stmt->bindParam(":id", $datosModel["id_producto"], PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

	}	

	public function seleccionarProductos3Model($tabla,$tienda,$datosModel){

		$stmt = Conexion::conectar()->prepare("SELECT stock FROM $tabla WHERE id_tienda = $tienda and id_producto = :id");
		$stmt->bindParam(":id", $datosModel["id_producto"], PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

	}	

	public function seleccionarUltimaVentaModel($tabla,$tienda){

		$stmt = Conexion::conectar()->prepare("SELECT id_venta FROM $tabla WHERE id_tienda = $tienda ORDER BY id_venta DESC LIMIT 1");	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

	}	

	public function seleccionarUltimoProdVendidoModel($tabla,$tienda){

		$stmt = Conexion::conectar()->prepare("SELECT id_producto_vendido,id_producto FROM $tabla WHERE id_tienda = $tienda ORDER BY id_producto_vendido DESC LIMIT 1");	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

	}

	/*public function selUltimoProdVendidoModel($tabla,$tienda,$id){

		$stmt = Conexion::conectar()->prepare("SELECT cantidad FROM $tabla WHERE id_tienda = $tienda and id_producto_vendido = $id ORDER BY id_producto_vendido DESC LIMIT 1");	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

	}*/

}





/*
#REGISTRO DE PRODUCTOS
	#-------------------------------------
	public function registroProductosModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreProd, descProduc, BuyPrice, SalePrice, Proce) VALUES (:nombreProd,:descProduc,:BuyPrice,:SalePrice,:Proce)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt1->bindParam(":nombreProd", $datosModel["nombreProd"], PDO::PARAM_STR);
		$stmt1->bindParam(":descProduc", $datosModel["descProduc"], PDO::PARAM_STR);
		$stmt1->bindParam(":BuyPrice", $datosModel["BuyPrice"], PDO::PARAM_STR);
		$stmt1->bindParam(":SalePrice", $datosModel["SalePrice"], PDO::PARAM_STR);
		$stmt1->bindParam(":Proce", $datosModel["Proce"], PDO::PARAM_STR);
		

		if($stmt1->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt1->close();

	}*/



?>