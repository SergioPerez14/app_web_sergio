<?php 
session_start();
if(!isset($_SESSION['username']))
{
	header('Location: index.php');
}

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
	        	<h4><b><center>Sistema de Ventas</center></b></h4>
	          <h4><b><font color=000000><center>Agregar Nuevo Usuario</center></font></b></h4>
	        
	        <div class="large-12 columns" style="background-color: #404247">
	        <br>
	        <h3><font color=ffffff>Informacion General</font></h3>
	        <br><br>
	        <div class="section-container tabs" data-section>
	          <section class="section">
	            <div class="content" data-slug="panel1">
	              <form method="POST" action="agregar2.php">
	              <label><font color=ffffff>Nombre: </font></label>
	              <input type="text" name="name" value=''>
	              <br>
	              <label><font color=ffffff>Descripcion: </font></label>
	              <input type="text" name="des" value=''>
  	              <br>
	              <label><font color=ffffff>Precio Unitario: </font></label>
	              <input type="text" name="precio" value=''>
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