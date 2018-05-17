	<?php

  	//El archivo connection.php permite la conexion a la base de datos mediante pdo
	require_once('connection.php');

	global $pdo,$sql;

	//Consulta las filas de la tabla futbol
	$sql = 'SELECT id,username,password FROM usuarios';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$filas_f = $statement->fetchAll(PDO::FETCH_OBJ);


	?>
	<!doctype html>
	<html class="no-js" lang="en">
	  <head>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <title>Practica 7 - Usuarios</title>
	    <link rel="stylesheet" href="./css/foundation.css" />
	    <script src="./js/vendor/modernizr.js"></script>
	  </head>
	  <body>
	     <?php require_once('header.php'); ?>
	    <div class="row">
	      <div class="large-12 columns">
	        	<h4><b><center><font color=000000>Ejercicio 2: Sistema de Control de Jugadores de la UPV</font></center></b></h4>
	          <h4><b><font color=000000><center>Listado de Jugadores de Futbol - UPV</center></font></b></h4>
	          <a href="./añadir.php" class="button radius tiny" style="background-color: #06515e">Agregar</a>
	          <a href="./index2.php" class="button radius tiny " style="background-color: #400063">Ir al listado de basquetbol</a>
	        <div class="section-container tabs" data-section>
	          <section class="section">
	            <div class="content" data-slug="panel1">
	              <div class="row">
	              </div>
	              <table style="background-color: #06515e">
	                <thead style="background-color: #06515e">
	                  <tr style="background-color: #06515e">
	                    <th width="200"><font color=ffffff>ID</th>
	                    <th width="300"><font color=ffffff>Username</th>
	                    <th width="200"><font color=ffffff>Password</th>
	                  </tr>
	                </thead>
	                <tbody>

	                  <tr>
	                	<?php foreach ($filas_f as $fila): ?>
		                  <tr style="background-color: #06515e">
		                    <td><font color=ffffff><?php echo $fila->id ?></td>
		                    <td><font color=ffffff><?php echo $fila->nombre ?></td>
		                    <td><font color=ffffff><?php echo $fila->posicion ?></td>
		                    <td><a href="./modificar.php?id=<?php echo $fila->id; ?>" class="button radius tiny" style="background-color: #c48301; font-style: white;">Modificar</a>
		                    	<a href="./eliminar.php?id=<?php echo $fila->id; ?>" class="button radius tiny alert"  onClick=mensaje();>Eliminar</a></td>
		                  </tr>
	                  	<?php endforeach ?>	                    
	                  </tr>

	                </tbody>
	              </table>
	            </div>
	          </section>
	        </div>	        	        
	      </div>
	    </div>
	    
	    <?php require_once('footer.php'); ?>

    <script type="text/javascript">

      //Funcion que envia un mensaje de confirmacion antes de una baja
      function mensaje()
      {
        var mensaje = confirm("¿Esta seguro de eliminar este usuario?");
        if(mensaje == false)
        {
          event.preventDefault();
        }
      }
    </script>