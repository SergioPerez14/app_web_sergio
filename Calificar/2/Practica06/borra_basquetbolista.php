<?php 
	include_once('Config2.php');

	//Se obtiene el id del basquetbolista del formulario anterior
	$Id = isset( $_GET['Id'] ) ? $_GET['Id'] : '';
     
    //Asignacion a una variable el Delete del basquetbolista seleccionado 
    //Se hace mediante el id cuando se selecciona el usuario
	$borrar = $conexion->prepare('DELETE FROM Basquetbolistas WHERE Id = :id');
	$borrar->bindParam(':id',$Id);
	$borrar->execute();
    
    //Alertas de confirmacion de eliminado
	echo '<script> alert("Basquetbolista Eliminado!"); </script>';
	//Redireccion de la pagina donde estan los basquetbolistas
    echo '<script> window.location = "index3.php"; </script>';

 ?>