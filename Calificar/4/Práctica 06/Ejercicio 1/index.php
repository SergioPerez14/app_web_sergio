<?php
//sentencia que incluye el archivo para conectarse a la BD
include ('conexion.php');

///sentencias para obtener las tablas de la base de datos
  $user = $conn->prepare('SELECT * FROM user');
  $user->execute();
  
  $status=$conn->prepare('SELECT * FROM status');
  $status->execute();
  //en esta sentencia se requiere de un inner join para mejorar la visualización de los campos de la tabla y hacerlo más sencillo de entender, incluyendo el correo y no el ID
  $usLog=$conn->prepare('SELECT ulog.id,ulog.date_logged_in,us.email as correo FROM user_log as ulog INNER JOIN user as us where us.id=ulog.user_id');
  $usLog->execute();
  $usType=$conn->prepare('SELECT * FROM user_type');
  $usType->execute();



//Sentencias de conteo de totales de cada tabla
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
       
    <div class="row">
      <a href = "nuevo.php" class="btn btn-primary"> </a>
 
      <div class="large-9 columns">
        <h1>Tecnologías y Aplicaciones Web - PHP & SQL</h3>
         <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              
              <table>
                <h3>Usuarios</h3>
                <thead>
                  <tr>
                    <th width="200">ID</th>
                    <th width="250">Email</th>
                    <th width="250">Password</th>
                    <th width="250">Status ID</th>
                    <th width="250">User Type</th>
                    <th></th>
                    
                  </tr>
                </thead>
                <tbody>
          <!-- Comienza estructura php para acomodar las columnas de la tabla de la bd en las columnas de nuestra tabla html -->
                <?php //
                while ($row = $user->fetch()) {
                     echo "<tr><td>".$row['id']."</td>";
                     echo "<td>".$row['email']."</td>";
                     echo "<td>".$row['password']."</td>";

                      if($row['status_id']==1){$type = 'Activo';} else{$type = 'Inactivo';}
                    echo "<td>".$type."</td>";
                     //echo "<td>".$row['status_id']."</td>";
                     if($row['user_type_id']==1){
                        $row ='Final';
                       } else{
                        $row='Administrador';
                      }
                    echo "<td>".$row."</td></tr>";


                    }
                ?>
                                
                  
                </tbody>
              </table>
             
              <table>
                <h3>Tipos de usuarios</h3>
                <thead>
                  <tr>
                    <th width="250">ID</th>
                    <th width="250">Nombre</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                while ($row = $usType->fetch()) {
                     echo "<tr><td>".$row['id']."</td>";
                     echo "<td>".$row['name']."</td></tr>";
                    
                      }
                ?>
                  
                </tbody>
              </table>
              <table>
                <h3>Accesos</h3>
                <thead>
                  <tr>
                    <th width="250">ID</th>
                    <th width="250">Fecha</th>
                    <th width="250">Usuario</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                while ($row = $usLog->fetch()) {
                     echo "<tr><td>".$row['id']."</td>";
                     echo "<td>".$row['date_logged_in']."</td>";
                     echo "<td>".$row['correo']."</td></tr>";
                    
                      }
                ?>
                </tbody>
              </table>
              <table>
                <h3>Status</h3>
                <thead>
                  <tr>
                    <th width="250">ID</th>
                    <th width="250">Nombre</th>
                  </tr>
                </thead>

                <tbody>
                  <?php 
                while ($row = $status->fetch()) {
                     echo "<tr><td>".$row['id']."</td>";
                     echo "<td>".$row['name']."</td></tr>";
                    
                      }
                ?>
                </tbody>
              </table>
               <table>
                 <h3>Totales</h3>
                <thead>
                  <tr>
                    <th width="200">Usuarios</th>
                    <th width="250">Tipos de Usuarios</th>
                    <th width="250">Status</th>
                    <th width="250">Accesos</th>
                    <th width="250">Usuarios Activos</th>
                    <th width="250">Usuarios Inactivos</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $tot1; ?></td>
                    <td><?php echo $tot2; ?></td>
                    <td><?php echo $tot4; ?></td>
                    <td><?php echo $tot3; ?></td>
                    <td><?php echo $tot5; ?></td>
                    <td><?php echo $tot1-$tot5; ?></td>
                  </tr>              

                  

                </tbody>


              </table>



              
            </div>
          </section>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>