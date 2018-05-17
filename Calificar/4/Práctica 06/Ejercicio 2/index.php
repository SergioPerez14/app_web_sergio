<?php
//sentencia que incluye el archivo para conectarse a la BD
include ('conexion.php');
include_once('db/database_utilities.php');
///sentencias para obtener las tablas de la base de datos
  $futbol = $conn->prepare('SELECT * FROM futbol');
  $futbol->execute();
  
  $basquet=$conn->prepare('SELECT * FROM basquet');
  $basquet->execute();
//en esta sentencia se requiere de un inner join para mejorar la visualización de los campos de la tabla y hacerlo más sencillo de entender, incluyendo el correo y no el ID
  

/*Sentencias de conteo de totales de cada tabla
  $tot1 = $conn->prepare('SELECT COUNT(*) FROM user');
  $tot1->execute();
  $tot1=$tot1->fetchColumn();

  $tot2 = $conn->prepare('SELECT COUNT(*) FROM user_type');
  $tot2->execute();
  $tot2=$tot2->fetchColumn();

  $tot3 = $conn->prepare('SELECT COUNT(*) FROM user_log');
  $tot3->execute();
  $tot3=$tot3->fetchColumn();

  $tot4 = $conn->prepare('SELECT COUNT(*) FROM status');
  $tot4->execute();
  $tot4=$tot4->fetchColumn();

  $tot5 = $conn->prepare('SELECT COUNT(*) FROM user WHERE status_id = 1');
  $tot5->execute();
  $tot5=$tot5->fetchColumn();
 
 
*/

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
  <script LANGUAGE="JavaScript">
function confirmDel(){

if (confirm("¿Realmente desea eliminarlo?"))
    return true; //con esto se ejecuta el href de link
else
    return false ;
}
</script>
  <body>
       
    <div class="row">
      <a href = "nuevo.php" class="btn btn-primary"> </a>
 
      <div class="large-9 columns">
        <h1>Tecnologías y Aplicaciones Web - PHP & SQL</h3>
         <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
                  <li><a href="nuevo.php">Nuevo</a></li>   
              </div>
              
              <table>
                <h3>Futbolistas</h3>
                <thead>
                  <tr>
                    <th width="200">ID</th>
                    <th width="250">Nombre</th>
                    <th width="250">Posicion</th>
                    <th width="250">Carrera</th>
                    <th width="250">Email</th>
                    <th></th>
                    
                  </tr>
                </thead>
                <tbody>
          <!-- Comienza estructura php para acomodar las columnas de la tabla de la bd en las columnas de nuestra tabla html -->
               <tbody>
                  
          <!-- Comienza estructura php para acomodar las columnas de la tabla de la bd en las columnas de nuestra tabla html -->
                <?php //
                while ($fut = $futbol->fetch()) {

                     ?>
                      <tr><td width="250"><?php echo $fut['id']; ?></td>
                      <td width="250"><?php echo $fut['nombre']; ?></td>
                      <td width="250"><?php echo $fut['posicion']; ?></td>
                      <td width="250"><?php echo $fut['carrera']; ?></td>
                      <td width="250"><?php echo $fut['email']; ?></td>
                      <td>
                        <a href="modificar.php?id= <?php echo $fut['id']; ?> " class="button tiny secondary">Modificar</a>

                        <a href="eliminarfut.php?id= <?php echo $fut['id']; ?>" class="button tiny alert" onclick="if(confirmDel() == false){return false;}">Eliminar</a>



                   <?php

                 }

                ?>
                                 
                </tbody>
              </table>
              <li><a href="basquet.php">Listado Basquetbolistas</a></li>         
              



              
            </div>
          </section>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>