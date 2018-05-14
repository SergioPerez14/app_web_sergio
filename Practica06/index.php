	<?php

  	//El archivo connection.php permite la conexion a la base de datos mediante pdo
	require_once('connection.php');

	global $pdo,$sql;
	
	//Consultar el total de usuarios
	$sql = 'SELECT COUNT(*) as total_users FROM user';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll();
	$total_users = $results[0]['total_users'];

	//Consultar cuantos tipos de usuarios hay
	$sql = 'SELECT COUNT(*) as total_users_types FROM user_type';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll();
	$total_users_types = $results[0]['total_users_types'];

	//Consultar cuantos status existen
	$sql = 'SELECT COUNT(*) as total_status FROM status';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll();
	$total_status = $results[0]['total_status'];

	//Consultar cuantos accesos se han hecho
	$sql = 'SELECT COUNT(*) as total_log FROM user_log';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll();
	$total_log = $results[0]['total_log'];

	//Consultar cuantos usuarios activos hay
	$sql = 'SELECT COUNT(*) as total_users_active FROM user WHERE status_id = 1';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll();
	$total_users_active = $results[0]['total_users_active'];

	//Consultar cuantos usuarios inactivos hay
	$sql = 'SELECT COUNT(*) as total_users_inactive FROM user WHERE status_id = 2';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll();
	$total_users_inactive = $results[0]['total_users_inactive'];

	//Consulta las filas de la tabla user_type
	$sql = 'SELECT user_type.id,user_type.name FROM user_type';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$filas = $statement->fetchAll(PDO::FETCH_OBJ);

	//Consulta las filas de la tabla status
	$sql = 'SELECT status.id,status.name FROM status';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$filas_s = $statement->fetchAll(PDO::FETCH_OBJ);

	//Consulta las filas de la tabla user_log
	$sql = 'SELECT user_log.id,user_log.date_logged_in, user_log.user_id FROM user_log';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$filas_log = $statement->fetchAll(PDO::FETCH_OBJ);

	//Consulta las filas de la tabla user
	$sql = 'SELECT user.id,user.email,user.password,user.status_id,user.user_type_id FROM user';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$filas_u = $statement->fetchAll(PDO::FETCH_OBJ);


	?>
	<!doctype html>
	<html class="no-js" lang="en">
	  <head>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <title>Curso PHP |  Bienvenidos</title>
	    <link rel="stylesheet" href="./css/foundation.css" />
	    <script src="./js/vendor/modernizr.js"></script>
	  </head>
	  <body>
	     
	    <div class="row">
	      <div class="large-12 columns">
	        <h3>Tecnologias y Aplicaciones Web - PHP & SQL</h3>
	        <br>
	        	<h4><b><center>Ejercicio 1: Contando Datos</center></b></h4>
	          <h4><b>Totales</b></h4>
	        <div class="section-container tabs" data-section>
	          <section class="section">
	            <div class="content" data-slug="panel1">
	              <div class="row">
	              </div>
	              <table>
	                <thead>
	                  <tr>
	                    <th width="200">Usuarios</th>
	                    <th width="200">Tipos</th>
	                    <th width="200">Status</th>
	                    <th width="200">Accesos</th>
	                    <th width="200">Usuarios Activos</th>
	                    <th width="200">Usuarios Inactivos</th>
	                  </tr>
	                </thead>
	                <tbody>

	                  <tr><?php //Impresion de los totales calculados anteriormente en las consultas ?>
	                    <td><?php echo $total_users ?></td>
	                    <td><?php echo $total_users_types ?></td>
	                    <td><?php echo $total_status ?></td>
	                    <td><?php echo $total_log ?></td>
	                    <td><?php echo $total_users_active ?></td>
	                    <td><?php echo $total_users_inactive ?></td>	                    
	                  </tr>

	                </tbody>
	              </table>
	            </div>
	          </section>
	        </div>
<br>
	        	<h4><b>Tabla: User</b></h4>
			<div class="section-container tabs" data-section>
	          <section class="section">
	            <div class="content" data-slug="panel1">
	              <div class="row">
	              </div>
	              <table>
	                <thead>
	                  <tr>
	                    <th width="200">ID</th>
	                    <th width="200">Email</th>
	                    <th width="200">Password</th>
	                    <th width="200">Status_id</th>
	                    <th width="200">User_type_id</th>
	                  </tr>
	                </thead>
	                <tbody>

	                	<?php foreach ($filas_u as $fila): ?>
	                  <tr><?php //Impresion de la tabla User?>
	                    <td><?php echo $fila->id ?></td>
	                    <td><?php echo $fila->email ?></td>
	                    <td><?php echo $fila->password ?></td>
	                    <td><?php echo $fila->status_id ?></td>
	                    <td><?php echo $fila->user_type_id ?></td>
	                  </tr>
	                  	<?php endforeach ?>

	                </tbody>
	              </table>
	            </div>
	          </section>
	        </div>
 <br>
	        	<h4><b>Tabla: User_log</b></h4>
			<div class="section-container tabs" data-section>
	          <section class="section">
	            <div class="content" data-slug="panel1">
	              <div class="row">
	              </div>
	              <table>
	                <thead>
	                  <tr>
	                    <th width="200">ID</th>
	                    <th width="200">Date_logged_in</th>
	                    <th width="200">User_id</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	<?php foreach ($filas_log as $fila): ?>
	                  <tr><?php //Impresion de la tabla User_log ?>
	                    <td><?php echo $fila->id ?></td>
	                    <td><?php echo $fila->date_logged_in ?></td>
	                    <td><?php echo $fila->user_id ?></td>
	                  </tr>
	                  	<?php endforeach ?>

	                </tbody>
	              </table>
	            </div>
	          </section>
	        </div>
 <br>
	        	<h4><b>Tabla: User_type</b></h4>
			<div class="section-container tabs" data-section>
	          <section class="section">
	            <div class="content" data-slug="panel1">
	              <div class="row">
	              </div>
	              <table>
	                <thead>
	                  <tr>
	                    <th width="200">ID</th>
	                    <th width="200">Name</th>

	                  </tr>
	                </thead>
	                <tbody>
	                	<?php foreach ($filas as $fila): ?>
	                  <tr><?php //Impresion de la tabla User_type ?>
	                    <td><?php echo $fila->id ?></td>
	                    <td><?php echo $fila->name ?></td>	                    
	                  </tr>
	                  	<?php endforeach ?>
	                </tbody>
	              </table>
	            </div>
	          </section>
	        </div>
 <br>
	        	<h4><b>Tabla: Status</b></h4>
			<div class="section-container tabs" data-section>
	          <section class="section">
	            <div class="content" data-slug="panel1">
	              <div class="row">
	              </div>
	              <table>
	                <thead>
	                  <tr>
	                    <th width="200">ID</th>
	                    <th width="200">Name</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	<?php foreach ($filas_s as $fila): ?>
	                  <tr><?php //Impresion de la tabla Status ?>
	                    <td><?php echo $fila->id ?></td>
	                    <td><?php echo $fila->name ?></td>	                    
	                  </tr>
	                  	<?php endforeach ?>

	                </tbody>
	              </table>
	            </div>
	          </section>
	        </div>	        	        
	      </div>
	    </div>