<?php 
	//Se referencia al archivo de conexion de la  base de datos
	include_once('Config2.php'); 
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Practica 6</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
	
	<?php require_once('header2.php'); ?>

    <div class="row"> 
      <div class="large-9 columns">
      	<h1>Tarea No. 2</h1><br>
          <div class="large-9 columns">
        </div>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <h5><strong>BASQUETBOLISTAS REGISTRADOS:</strong></h5>
              <table>
                <thead>
                  <tr>
                    <th width="200">Id</th>
                    <th width="250">Dorsal</th>
                    <th width="700">Nombre</th>
                    <th width="250">Carrera</th>
                    <th width="250">Email</th>
                    <th width="250">Posicion</th>
                    <th width="250">Detalles</th>
                    <th width="250">Delete</th>

                  </tr>
                </thead>
                <tbody>
                 <?php
                   //Consulta de la base de datos de los campos que se desean mostrar
                   //Incluyen los case para los diferentes casos que se desean validar 
                   $datos = $conexion->query("SELECT Id, Dorsal, Nombre, Carrera, Email, Posicion FROM Basquetbolistas");
                   //Ciclo que recorre las filas e imprime los datos que existen encada una de ellas
                   foreach($datos as  $fila){
                    echo "<tr><td>".$fila['Id']."</td>";
                    echo "<td>".$fila['Dorsal']."</td>";
                    echo "<td>".$fila['Nombre']."</td>";  
                    echo "<td>".$fila['Carrera']."</td>";
                    echo "<td>".$fila['Email']."</td>";
                    echo "<td>".$fila['Posicion']."</td>";
                    echo '<td><a href = "./modificar_basquetbolista.php?Id='.$fila['Id'].'" class="button tiny secondary"> Detalles </a></td>';
                    echo '<td><a href = "./borra_basquetbolista.php?Id='.$fila['Id'].'" class="button tiny secondary"> Delete </a></td></tr>';
                   }    
                ?> 
                <ul class="center button-group">
                  <li><br><a href="./agregar_basquetbolista.php" class="button">Registrar Nuevo</a></li>
                </ul>
                </tbody>
              </table>
            </div>
          </section>


      </div>
    </div>
<?php require_once('footer.php'); ?>