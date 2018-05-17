<?php 
require ('conexion.php');

function mostrar(){

global $mysqli;
$sql = "SELECT * FROM lista";
$res = $mysqli->query($sql);
$row = "";
 while($row = mysqli_fetch_array($res)){
 	echo  "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['correo'] . "</td>";
    echo  "<td><a href=\"./key.php?id=". $row['id'] . "\" class=\"button radius tiny secondary\">Ver detalles</a></td></tr>";
  }

}



?>