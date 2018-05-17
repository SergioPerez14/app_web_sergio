<?php

include_once('db/database_utilities.php');

header('Location: index.php');
//Se pasa el siguiente parametro ($id) por la URL en index.php para ejecutar la eliminación:
$id = isset( $_GET['id'] ) ? $_GET['id'] : 0;
//función de eliminación en database_utilities.php
eliminarf($id);

?>