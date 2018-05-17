<?php
//sentencia que incluye el archivo para conectarse a la BD
include ('conexion.php');
include_once('db/database_utilities.php');
///sentencias para obtener las tablas de la base de datos
  $futbol = $conn->prepare('SELECT * FROM futbol');
  $futbol->execute();
  
  $basquet=$conn->prepare('SELECT * FROM basquet');
  $basquet->execute();


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
      <a href = "index.php" class="btn btn-primary"> </a>
 
      <div class="large-9 columns">
        <h1>Tecnologías y Aplicaciones Web - PHP & SQL</h3>
         <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
                <li><a href="nuevobas.php">Nuevo</a></li>   
              </div>
             <table>
                <h3>Basquetbolistas</h3>
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
                <?php //
                while ($bas = $basquet->fetch()) {

                     ?>
                      <tr><td width="250"><?php echo $bas['id']; ?></td>
                      <td width="250"><?php echo $bas['nombre']; ?></td>
                      <td width="250"><?php echo $bas['posicion']; ?></td>
                      <td width="250"><?php echo $bas['carrera']; ?></td>
                      <td width="250"><?php echo $bas['email']; ?></td>
                      <td><a href="modificarbas.php?id=<?php echo $bas['id']; ?>" class="button radius tiny secondary" style="background-color: blue; color:white">Modificar</a>&nbsp;
                        <a href="eliminarbas.php?id= <?php echo $bas['id']; ?>" class="button tiny alert" onclick="if(confirmDel() == false){return false;}">Eliminar</a>



                   <?php

                 }

                ?>
                                 
                </tbody>
              </table>
             
              

<li><a href="index.php">Listado Futbolistas</a></li>

              
            </div>
          </section>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>