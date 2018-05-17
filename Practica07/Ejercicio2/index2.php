	<?php

  	//El archivo connection.php permite la conexion a la base de datos mediante pdo
	require_once('connection.php');

	global $pdo,$sql;

	//Consulta las filas de la tabla basquetbol
	$sql = 'SELECT id,nombre,posicion,carrera,email FROM basquetbol';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$filas_f = $statement->fetchAll(PDO::FETCH_OBJ);


	?>
	<!doctype html>
	<html class="no-js" lang="en">
	  <head>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <title>Basquetbol |  UPV</title>
	    <link rel="stylesheet" href="./css/foundation.css" />
	    <script src="./js/vendor/modernizr.js"></script>
	  </head>
	  <body>
	     <?php require_once('header2.php'); ?>
	    <div class="row">
	      <div class="large-12 columns">
	        <br>
	        	<h4><b><center><font color=ffffff>Ejercicio 2: Sistema de Control de Jugadores de la UPV</font></center></b></h4>
	          <h4><b><font color=ffffff><center>Listado de Jugadores de Basquetbol - UPV</center></font></b></h4>
	          <a href="./añadir2.php" class="button radius tiny " style="background-color: gray">Agregar</a>
	          <a href="./index.php" class="button radius tiny " style="background-color: #c48301">Ir al listado de futbol</a>
	        <div class="section-container tabs" data-section>
	          <section class="section">
	            <div class="content" data-slug="panel1">
	              <div class="row">
	              </div>
	              <table style="background-color: gray">
	                <thead style="background-color: gray">
	                  <tr style="background-color: gray">
	                    <th width="200">ID</th>
	                    <th width="300">Nombre</th>
	                    <th width="200">Posicion</th>
	                    <th width="200">Carrera</th>
	                    <th width="200">Email</th>
	                    <th width="750">Acciones</th>
	                  </tr>
	                </thead>
	                <tbody>

	                  <tr>
	                	<?php foreach ($filas_f as $fila): ?>
		                  <tr style="background-color: gray">
		                    <td><?php echo $fila->id ?></td>
		                    <td><?php echo $fila->nombre ?></td>
		                    <td><?php echo $fila->posicion ?></td>
		                    <td><?php echo $fila->carrera ?></td>
		                    <td><?php echo $fila->email ?></td>
		                    <td><a href="./modificar2.php?id=<?php echo $fila->id; ?>" class="button radius tiny" style="background-color: purple; font-style: white;">Modificar</a>
		                    	<a href="./eliminar2.php?id=<?php echo $fila->id; ?>" class="button radius tiny alert"  onClick=mensaje();>Eliminar</a></td>
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
	    
	    <?php require_once('footer2.php'); ?>

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