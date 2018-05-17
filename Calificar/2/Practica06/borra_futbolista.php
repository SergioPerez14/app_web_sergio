<?php 
	include_once('Config2.php');

	//Se obtiene el id del futbolista del formulario anterior
	$Id = isset( $_GET['Id'] ) ? $_GET['Id'] : '';
     
    //Asignacion a una variable el Delete del futbolista seleccionado 
    //Se hace mediante el id cuando se selecciona el usuario
	$borrar = $conexion->prepare('DELETE FROM Futbolistas WHERE Id = :id');
	$borrar->bindParam(':id',$Id);
	$borrar->execute();
    
    //Alertas de confirmacion de eliminado
	echo '<script> alert("Futbolista Eliminado!"); </script>';
	//Redireccion de la pagina donde estan los futbolistas
    echo '<script> window.location = "index2.php"; </script>';

 ?>