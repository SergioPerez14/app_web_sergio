	<?php

  	//El archivo database_utilities es requerido debido a que contiene las funciones para el manejo de los registros en el listado
	require_once('database_utilities.php');
	
	//La funcion run_query hace una consulta para traer todos los registros con todos los datos de la tabla y esto se almacenara en la variable resultado
	$resultado = run_query();
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
	    
	    <?php require_once('header.php'); ?>
	     
	    <div class="row">
	      <div class="large-9 columns">
	        <h3>Ejemplos de listado en array</h3>
	          <a href="./añadir.php" class="button radius tiny success">Nuevo</a>
	          <p>Listado</p>
	        <div class="section-container tabs" data-section>
	          <section class="section">
	            <div class="content" data-slug="panel1">
	              <div class="row">
	              </div>
	              <?php if($resultado){ ?>
	              <table>
	                <thead>
	                  <tr>
	                    <th width="200">ID</th>
	                    <th width="250">Correo</th>
	                    <th width="250">Contraseña</th>
	                    <th width="400">Accion</th>
	                  </tr>
	                </thead>
	                <tbody>
	                  <?php foreach( $resultado as $id => $user ){ 
	                  ?>
	                  <tr>
	                    <td><?php echo $user['id'] ?></td>
	                    <td><?php echo $user['correo'] ?></td>
	                    <td><?php echo $user['password'] ?></td>
	                    <td><a href="./modificar.php?id=<?php echo $user['id']; ?>" class="button radius tiny secondary">Ver Detalles</a>
	                    <a href="./key.php?id=<?php echo $user['id']; ?>" class="button radius tiny alert"  onClick=mensaje();>Eliminar</a></td>	                    
	                  </tr>
	                  <?php } ?>
	                  <tr>
	                    <td colspan="4"><b>Total de registros: </b> <?php echo $resultado->num_rows; ?></td>
	                  </tr>
	                </tbody>
	              </table>
	              <?php }else{ ?>
	              		No existen registros
	              <?php } ?>
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