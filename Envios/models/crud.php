<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

//heredar la clase conexion de conexion.php para poder utilizar "Conexion" del archivo conexion.php.
// Se extiende cuando se requiere manipuar una funcion, en este caso se va a  manipular la función "conectar" del models/conexion.php:
class Datos extends Conexion{

	#REGISTRO DE ALUMNAS
	#-------------------------------------
	public function registroAlumnasModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, apellido, id_grupo) VALUES (:nombre,:apellido,:id)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	//REGISTRO DE PAGOS
	public function registroPagoModel($datosModel, $tabla){

	#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_grupo, id_alumna, M_nombre, M_apellido, comprobante, folio, fecha_pago, fecha_envio) VALUES (:id_grupo, :id_alumna, :M_nombre, :M_apellido, :comprobante, :folio, :fecha_pago, :fecha_envio)");	

	#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
	$stmt->bindParam(":id_grupo", $datosModel["id_grupo"]);
	$stmt->bindParam(":id_alumna", $datosModel["id_alumna"]);
	$stmt->bindParam(":M_nombre", $datosModel["M_nombre"]);
	$stmt->bindParam(":M_apellido", $datosModel["M_apellido"]);
	$stmt->bindParam(":comprobante", $datosModel["comprobante"]);
	$stmt->bindParam(":folio", $datosModel["folio"]);
	$stmt->bindParam(":fecha_pago", $datosModel["fecha_pago"]);
	$stmt->bindParam(":fecha_envio", $datosModel["fecha_envio"]);

	if($stmt->execute()){

		return "success";

	}

	else{

		return "error";

	}

	$stmt->close();

	}

	#REGISTRO DE GRUPO
	#------------------------------------
	public function registroGrupoModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);

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

		$stmt = Conexion::conectar()->prepare("SELECT username, password, id_usuario, nombre FROM $tabla WHERE username = :username");	
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

	}


	#VISTA DE ALUMNAS
	#-------------------------------------

	public function vistaAlumnasModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#VISTA DE PAGOS
	#-------------------------------------

	public function vistaPagosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla as p INNER JOIN alumnas as a on a.id_alumna = p.id_alumna");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	//VISTA DE PAGOS ORDENADOS POR FECHA DE ENVIO, ES DECIR LOS LUGARES EN MODO PUBLICO
	public function vistaPagos2Model($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla as p INNER JOIN alumnas as a on a.id_alumna = p.id_alumna ORDER BY fecha_envio");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#VISTA DE GRUPOS
	#-------------------------------------

	public function vistaGruposModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id_grupo, nombre FROM $tabla ");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}	

	#TOTAL USUARIOS
	#-------------------------------------

	public function totalUsuariosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}

	#TOTAL PAGOS
	#-------------------------------------

	public function totalPagosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}

	#TOTAL GRUPOS
	#-------------------------------------

	public function totalGruposModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}	

	#TOTAL ALUMNAS
	#-------------------------------------

	public function totalAlumnasModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}		

	#EDITAR ALUMNAS
	#-------------------------------------

	public function editarAlumnaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id_alumna, nombre, apellido, id_grupo FROM $tabla WHERE id_alumna = :id");
		$stmt->bindParam(":id", $datosModel);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	//EDITAR PAGO

	public function editarPagoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_pago = :id");
		$stmt->bindParam(":id", $datosModel);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}
	

	#EDITAR GRUPO
	#-------------------------------------

	public function editarGrupoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id_grupo, nombre FROM $tabla WHERE id_grupo = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}	

	#ACTUALIZAR ALUMNAS
	#-------------------------------------

	public function actualizarAlumnaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, id_grupo = :id_grupo WHERE id_alumna = :id");

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":id_grupo", $datosModel["id_grupo"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id_alumna"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	//ACTUALIZAR PAGO
	public function actualizarPagoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_pago = :id, id_grupo = :id_grupo, id_alumna = :id_alumna, M_nombre = :nombre, M_apellido = :apellido, comprobante = :comprobante, folio = :folio, fecha_pago = :fechapago, fecha_envio = :fechaenvio WHERE id_pago = :id");

		$stmt->bindParam(":id_alumna", $datosModel["id_alumna"], PDO::PARAM_STR);
		$stmt->bindParam(":comprobante", $datosModel["comprobante"], PDO::PARAM_STR);
		$stmt->bindParam(":fechapago", $datosModel["fecha_pago"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaenvio", $datosModel["fecha_envio"], PDO::PARAM_STR);
		$stmt->bindParam(":folio", $datosModel["folio"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["M_nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["M_apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":id_grupo", $datosModel["id_grupo"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id_pago"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}		

	#ACTUALIZAR GRUPO
	#-------------------------------------

	public function actualizarGruposModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id_grupo = :id");

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id_grupo"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}	

	#BORRAR ALUMNA
	#------------------------------------
	public function borrarAlumnaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_alumna = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#BORRAR PAGO
	#------------------------------------
	public function borrarPagoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_pago = :id");
		$stmt->bindParam(":id", $datosModel);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#BORRAR GRUPO
	#------------------------------------
	public function borrarGrupoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_grupo = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}		

	#OBTENER LAS ALUMNAS
	#------------------------------------
	public function seleccionarGAlumnasModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id_alumna,nombre, apellido FROM $tabla");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}	


	#OBTENER LOS GRUPOS
	#------------------------------------
	public function seleccionarGruposModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id_grupo, nombre FROM $tabla");	
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

	#OBTENER LOS GRUPOS
	#------------------------------------
	public function seleccionarGrupos($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}	

	//OBTENER LAS ALUMNAS POR GRUPO
	public function seleccionarAlumnasXGrupo($tabla,$id){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_grupo = $id");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}		

}

?>