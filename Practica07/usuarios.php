	<?php 
	session_start();
	if(!isset($_SESSION['username']))
	{
		header('Location: index.php');
	}

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
	        	<h4><b><center><font color=000000>Sistema de Ventas</font></center></b></h4>
	          <h4><b><font color=000000><center>Listado de Usuarios</center></font></b></h4>
	          <a href="./añadir.php" class="button radius tiny" style="background-color: #06515e">Agregar Nuevo Usuario</a>
	          <a href="./productos.php" class="button radius tiny " style="background-color: #06515e">Ir al listado de Productos</a>
	          <a href="./ventas.php" class="button radius tiny " style="background-color: #06515e">Ir al listado de Ventas</a>
	        <div class="section-container tabs" data-section>
	          <section class="section">
	            <div class="content" data-slug="panel1">
	              <div class="row">
	              </div>
	              <table style="background-color: #06515e">
	                <thead style="background-color: #06515e">
	                  <tr style="background-color: #06515e">
	                    <th width="300"><font color=ffffff>ID</th>
	                    <th width="300"><font color=ffffff>Username</th>
	                    <th width="300"><font color=ffffff>Password</th>
	                    <th width="300"><font color=ffffff>Acciones</th>
	                  </tr>
	                </thead>
	                <tbody>

	                  <tr>
	                	<?php foreach ($filas_f as $fila): ?>
		                  <tr style="background-color: #ffffff">
		                    <td><font color=000000><?php echo $fila->id ?></td>
		                    <td><font color=000000><?php echo $fila->username ?></td>
		                    <td><font color=000000><?php echo $fila->password ?></td>
		                    <td><center><a href="./modificar.php?id=<?php echo $fila->id; ?>" class="button radius tiny" style="background-color: #e09006; font-style: white;">Modificar</a>
		                    	<a href="./eliminar.php?id=<?php echo $fila->id; ?>" class="button radius tiny alert"  onClick=mensaje();>Eliminar</a></center></td>
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