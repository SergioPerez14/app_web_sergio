
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
	        	<h4><b><center><font color=ffffff>Ejercicio 2: Sistema de Control de Jugadores de la UPV</font></center></b></h4>
	          <h4><b><font color=ffffff><center>Listado de Jugadores de Futbol - UPV</center></font></b></h4>
	        
	        <div class="large-12 columns" style="background-color: gray">
	        <br>
	        <h3><font color=ffffff>Informacion General</font></h3>
	        <br><br>
	        <div class="section-container tabs" data-section>
	          <section class="section">
	            <div class="content" data-slug="panel1">
	              <div class="row">
	              </div>
	              <form method="POST" action="agregar.php">
	              <label><font color=ffffff>ID:  </font></label>
	              <input type="text" name="id" value="">
	              <br>
	              <label><font color=ffffff>Username: </font></label>
	              <input type="text" name="name" value=''>
	              <br>
	              <label><font color=ffffff>Password: </font></label>
	              <input type="Password" name="pos" value=''>
	              <br>
	              <center><input type="submit" name="guardar" style="background-color: #c48301;" value="Guardar" class="button"></center>
	              <center><a href="./usuarios.php" class="button">Volver al listado</a></center>
	              </form>
	            </div>
	          </section>
	        </div>
	        
	      </div>

	      </div>
	    </div>
	    
	    <?php require_once('footer.php'); ?>