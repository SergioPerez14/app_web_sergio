<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

//heredar la clase conexion de conexion.php para poder utilizar "Conexion" del archivo conexion.php.
// Se extiende cuando se requiere manipuar una funcion, en este caso se va a  manipular la función "conectar" del models/conexion.php:
class Datos extends Conexion{

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroAlumnoModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (matricula, nombre, carrera, tutor) VALUES (:matricula,:nombre,:carrera,:tutor)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":tutor", $datosModel["tutor"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#INGRESO USUARIO
	#-------------------------------------
	public function ingresoMaestroModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT email, password FROM $tabla WHERE email = :correo");	
		$stmt->bindParam(":correo", $datosModel["email"], PDO::PARAM_STR);
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

	}

	#VISTA ALUMNOS
	#-------------------------------------

	/*public function vistaAlumnosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT matricula, nombre, carrera, tutor FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}*/

	public function vistaAlumnosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT *, carreras.nombre as cname, maestros.nombre as mname, alumnos.nombre as aname FROM $tabla INNER JOIN carreras on $tabla.carrera = carreras.id INNER JOIN maestros on $tabla.tutor = maestros.nempleado");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#EDITAR ALUMNO
	#-------------------------------------

	/*public function editarAlumnosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT matricula, nombre, carrera, tutor FROM $tabla WHERE matricula = :matricula");
		$stmt->bindParam(":matricula", $datosModel, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}*/

	public function editarAlumnosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT *, carreras.nombre as cname, maestros.nombre as mname, alumnos.nombre as aname, alumnos.carrera as acarrera FROM alumnos INNER JOIN carreras on alumnos.carrera = carreras.id INNER JOIN maestros on alumnos.tutor = maestros.nempleado WHERE matricula = :matricula");
		$stmt->bindParam(":matricula", $datosModel, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	public function vistaCarrerasModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id,nombre FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#ACTUALIZAR ALUMNO
	#-------------------------------------

	public function actualizarAlumnosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, carrera = :carrera, tutor = :tutor WHERE matricula = :matricula");

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":tutor", $datosModel["tutor"], PDO::PARAM_STR);
		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#BORRAR ALUMNO
	#------------------------------------
	public function borrarAlumnoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE matricula = :matricula");
		$stmt->bindParam(":matricula", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	public function ObtenerCarrerasModel($tabla){

		

		$stmt = Conexion::conectar()->prepare("SELECT id,nombre FROM $tabla");	
		$stmt->execute();



		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	public function ObtenerMaestrosModel($tabla){

		

		$stmt = Conexion::conectar()->prepare("SELECT nempleado,nombre FROM $tabla");	
		$stmt->execute();



		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}


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