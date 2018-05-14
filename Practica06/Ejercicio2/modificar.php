<?php
	require_once('connection.php');

	$id = $_GET['id'];
	global $pdo,$sql;

	//Consulta para traer los datos de la tabla futbol dependiendo del id de jugador
	$sql = 'SELECT * FROM futbol WHERE id= :id';
	$statement = $pdo->prepare($sql);
	$statement->bindParam(':id',$id);
	$statement->execute();
	$result = $statement->fetchAll();

	/*echo "<pre>";
	print_r($result);
	echo "</pre>";*/
?>


<!doctype html>
	<html class="no-js" lang="en">
	  <head>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <title>Futbol |  UPV</title>
	    <link rel="stylesheet" href="./css/foundation.css" />
	    <script src="./js/vendor/modernizr.js"></script>
	  </head>
	  <body>
	     <?php require_once('header.php'); ?>
	    <div class="row">
	      <div class="large-12 columns">
	        	<h4><b><center><font color=ffffff>Ejercicio 2: Sistema de Control de Jugadores de la UPV</font></center></b></h4>
	          <h4><b><font color=ffffff><center>Listado de Jugadores de Futbol - UPV</center></font></b></h4>
	        
	        <div class="large-12 columns" style="background-color: #06515e">
	        <br>
	        <h3><font color=ffffff>Informacion General</font></h3>
	        <br><br>
	        <div class="section-container tabs" data-section>
	          <section class="section">
	            <div class="content" data-slug="panel1">
	              <div class="row">
	              </div>
	              <form method="POST" action="update.php">
	              <label><font color=ffffff>ID:  </font></label><?php //Se imprimen los valores del resultado de la consulta ?>
	              <input type="text" name="id" value="<?php echo $result[0]['id']; ?>" readonly>
	              <br>
	              <label><font color=ffffff>Nombre: </label>
	              <input type="text" name="name" value='<?php echo $result[0]['nombre']; ?>'>
	              <br>
	              <label><font color=ffffff>Posicion: </label>
	              <input type="text" name="pos" value='<?php echo $result[0]['posicion']; ?>'>
	              <br>
	              <label><font color=ffffff>Carrera: </label>
	              <input type="text" name="carrera" value='<?php echo $result[0]['carrera']; ?>'>
	              <br>
	              <label><font color=ffffff>Email: </label>
	              <input type="text" name="email" value='<?php echo $result[0]['email']; ?>'>
	              <br>
	              <center><input type="submit" name="editar" style="background-color: #c48301;" value="Editar" class="button" onclick="mensaje()"></center>
	              <center><a href="./index.php" class="button">Volver al listado</a></center>
	              </form>
	            </div>
	          </section>
	        </div>
	      </div>

	      </div>
	    </div>
	    
	    <?php require_once('footer.php'); ?>

    <script type="text/javascript">

      //Funcion que envia un mensaje de confirmacion de la modificacion
      function mensaje()
      {
        var mensaje = confirm("¿Esta seguro de modificar este usuario?");
        if(mensaje == false)
        {
          event.preventDefault();
        }
      }
    </script>