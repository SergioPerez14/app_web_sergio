<?php 
session_start();
if(!isset($_SESSION['username']))
{
	header('Location: index.php');
}

?>

	<?php

  	//El archivo connection.php permite la conexion a la base de datos mediante pdo
	require_once('connection.php');

	global $pdo,$sql;

	//Consulta las filas de la tabla futbol
	$sql = 'SELECT id,monto,fecha FROM ventas';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$filas_f = $statement->fetchAll(PDO::FETCH_OBJ);


	?>
	<!doctype html>
	<html class="no-js" lang="en">
	  <head>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <title>Practica 7 - Ventas</title>
	    <link rel="stylesheet" href="./css/foundation.css" />
	    <script src="./js/vendor/modernizr.js"></script>
	  </head>
	  <body>
	     <?php require_once('header.php'); ?>
	    <div class="row">
	      <div class="large-12 columns">
	        	<h4><b><center><font color=000000>Sistema de Ventas</font></center></b></h4>
	          <h4><b><font color=000000><center>Listado de Ventas Relizadas</center></font></b></h4>
	          <a href="./añadir3.php" class="button radius tiny" style="background-color: #06515e">Agregar Nuevo Venta</a>
	          <a href="./usuarios.php" class="button radius tiny " style="background-color: #06515e">Ir al listado de Usuarios</a>
	          <a href="./productos.php" class="button radius tiny " style="background-color: #06515e">Ir al listado de Productos</a>
	        <div class="section-container tabs" data-section>
	          <section class="section">
	            <div class="content" data-slug="panel1">
	              <div class="row">
	              </div>
	              <table style="background-color: #06515e">
	                <thead style="background-color: #06515e">
	                  <tr style="background-color: #06515e">
	                    <th width="50"><font color=ffffff>ID</th>
	                    <th width="300"><font color=ffffff>Total</th>
	                    <th width="400"><font color=ffffff>Fecha</th>
	                    <th width="300"><font color=ffffff>Acciones</th>
	                  </tr>
	                </thead>
	                <tbody>

	                  <tr>
	                	<?php foreach ($filas_f as $fila): ?>
		                  <tr style="background-color: #ffffff">
		                    <td><font color=000000><?php echo $fila->id ?></td>
		                    <td><font color=000000>$<?php echo $fila->monto ?></td>
		                    <td><font color=000000><?php echo $fila->fecha ?></td>	                    	
		                    <td><center><a href="./detalles_venta.php?id=<?php echo $fila->id; ?>" class="button radius tiny" style="background-color: #e09006; font-style: white;">Ver detalles</a></center></td>
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