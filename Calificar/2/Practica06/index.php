<?php 
  //Se referencia al archivo de conexion de la  base de datos
  include_once('Config.php'); 


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
  
  <?php require_once('header.php'); ?>

    <div class="row"> 
      <div class="large-9 columns">
        <h1>Tarea No. 1</h1><br>
        <h5><strong>DATOS CONTENIDOS</strong></h5>

        
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <table>
                <thead>
                <tr>
                  <th width="200">Usuarios</th>
                  <th width="250">Tipos</th>
                  <th width="250">Status</th>
                  <th width="250">Accesos</th>
                  <th width="250">Activos</th>
                  <th width="250">Inactivos</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php 
                      //Consultas de la bd para el llenado de los campos requeridos en la tabla

                      //Asignacion a la varible total_usuarios la consulta del numero de usuarios en la bd
                      $total_usuarios = $var->prepare('SELECT COUNT(*) FROM user');
                      $total_usuarios->execute();
                      $total_usuarios = $total_usuarios->fetchColumn();
                      //Asignacion a la varible tipo_usuario la consulta del numero de tipos de usuarios encontrados
                      $tipo_usuarios = $var->prepare('SELECT COUNT(*) FROM user_type');
                      $tipo_usuarios->execute();
                      $tipo_usuarios = $tipo_usuarios->fetchColumn();
                      //Asignacion a la varible status la consulta del numero de status
                      $estatus = $var->prepare('SELECT COUNT(*) FROM status');
                      $estatus->execute();
                      $estatus = $estatus->fetchColumn();
                      //Asignacion a la varible acessos la consulta del numero de usuarios registrados
                      $acccesos = $var->prepare('SELECT COUNT(*) FROM user_log');
                      $acccesos->execute();
                      $acccesos = $acccesos->fetchColumn();
                      //Asignacion a la varible activos la consulta del numero de usuarios activos en la bd
                      $activos = $var->prepare('SELECT COUNT(*) FROM `user` WHERE status_id= 1 ');
                      $activos->execute();
                      $activos = $activos->fetchColumn();
                      //Asignacion a la varible inaactivoss la consulta del numero de usuarios inactivos en la bd
                      $inaactivos = $var->prepare('SELECT COUNT(*) FROM `user` WHERE status_id= 2 ');
                      $inaactivos->execute();
                      $inaactivos = $inaactivos->fetchColumn();


                    //Despliegue de resultados de las consultas en cada una de las columnas requeridas ?>
                    <td><?php  echo $total_usuarios; ?></td>
                    <td><?php  echo $tipo_usuarios; ?></td>
                    <td><?php  echo $estatus; ?></td>
                    <td><?php  echo $acccesos; ?></td>
                    <td><?php  echo $activos; ?></td>
                    <td><?php  echo $inaactivos; ?></td>
                  </tr>
                </tbody>
              </table>
            
            <h5><strong>USUARIOS:</strong></h5>
              <table>
                <thead>
                  <tr>
                  <th width="200">Id</th>
                  <th width="250">Email</th>
                  <th width="250">Password</th>
                  <th width="250">Status</th>
                  <th width="250">Tipo de Usuario</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                   //Consulta de la base de datos de los campos que se desean mostrar
                   //Incluyen los case para los diferentes casos que se desean validar 
                   $datos = $var->query("SELECT id, email, password, case status_id when 1 then 'Activo' else 'Inactivo' end status_id,case user_type_id when 1 then 'Final' else 'Admin' end user_type_id FROM user");
                   //Ciclo que recorre las filas e imprime los datos que existen encada una de ellas
                   foreach($datos as  $fila){
                    echo "<tr><td>".$fila['id']."</td>";
                    echo "<td>".$fila['email']."</td>";
                    echo "<td>".$fila['password']."</td>";  
                    echo "<td>".$fila['status_id']."</td>";
                    echo "<td>".$fila['user_type_id']."</td>";
                   }    
                ?> 
                </tbody>
              </table>
              <h5><strong>TIPOS DE USUARIOS</strong></h5>
              <table>
                <thead>
                  <tr>
                  <th width="200">Id</th>
                  <th width="250">Nombre</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                   //Consulta de la base de datos de los campos que se desean mostrar
                   $datos = $var->query("SELECT id, name FROM user_type");
                   //Ciclo que recorre las filas e imprime los datos que existen en cada una de ellas
                   foreach($datos as  $fila){
                    echo "<tr><td>".$fila['id']."</td>";
                    echo "<td>".$fila['name']."</td></tr>";
                   }    
                ?> 
                </tbody>
              </table>
              <h5><strong>REGISTROS DE USUARIOS</strong></h5>
              <table>
                <thead>
                  <tr>
                  <th width="200">Id</th>
                  <th width="250">Fecha de ingreso</th>
                  <th width="250">Usuario</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                   //Consulta de la base de datos de los campos que se desean mostrar
                   $datos = $var->query("SELECT id, date_logged_in, user_id FROM user_log");
                   //Ciclo que recorre las filas e imprime los datos que existen encada una de ellas
                   foreach($datos as  $fila){
                    echo "<tr><td>".$fila['id']."</td>";
                    echo "<td>".$fila['date_logged_in']."</td>";
                    echo "<td>".$fila['user_id']."</td></tr>";
                   }    
                ?> 
                </tbody>
              </table>
              <h5><strong>STATUS</strong></h5>
              <table>
                <thead>
                  <tr>
                  <th width="200">Id</th>
                  <th width="250">Nombre</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                   //Consulta de la base de datos de los campos que se desean mostrar
                   $datos = $var->query("SELECT id, name FROM status");
                   //Ciclo que recorre las filas e imprime los datos que existen en cada una de ellas
                   foreach($datos as  $fila){
                    echo "<tr><td>".$fila['id']."</td>";
                    echo "<td>".$fila['name']."</td></tr>";
                   }    
                ?> 
                </tbody>
              </table>

            </div>
          </section>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>