<?php

require_once "conexion.php";

class Datos extends Conexion{

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroAlumnoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (matricula, nombre, carrera, tutor) VALUES (:matricula,:nombre,:carrera,:tutor)");	

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

		return $stmt->fetch();

		$stmt->close();

	}

	#VISTA ALUMNOS
	#-------------------------------------

	public function vistaAlumnosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT matricula, nombre, carrera, tutor FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

	#EDITAR ALUMNO
	#-------------------------------------

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

}


?>