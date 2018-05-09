<?php

//El archivo database_utilities es requerido debido a que contiene las funciones para el manejo de los registros en el listado
require_once('database_utilities.php');

//Se obtiene el id del usuario a eliminar, este id ira en el url
$id = isset( $_GET['id'] ) ? $_GET['id'] : '';

//Se eliminara el usuario en base al id que se paso como parametro
borrar($id);

//Direcciona al index.php o inicio del listado
header('Location: index.php')
?>