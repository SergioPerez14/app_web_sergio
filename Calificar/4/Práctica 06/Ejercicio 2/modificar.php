<?php

require ('db/database_utilities.php');

$id = isset( $_GET['id'] ) ? $_GET['id'] : '';
$fut = get_fut_by_id( $id );

if( $_POST)
{

  header('Location: index.php');
  //die();
  $nombre = isset( $_POST['nombre'] ) ? $_POST['nombre'] : '';
  $posicion = isset( $_POST['posicion'] ) ? $_POST['posicion'] : '';
  $carrera = isset($_POST['carrera']) ? $_POST['carrera']: '';
  $email = isset($_POST['email']) ? $_POST['email']: '';
  //Se implementa el método "modificarfutbol" para ejecutar el update
  modificarfutbol($id,$nombre,$posicion,$carrera,$email);
  //terminamos la ejecución
  die();

}


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
       
    <div class="row">
      <a href = "index.php" class="btn btn-primary"> </a>
 
      <div class="large-9 columns">
        <h1>Tecnologías y Aplicaciones Web - PHP & SQL</h3>
         <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <form method="post">
                 <div class="large-12 columns">
                    <label>Nombre
                      <!--asignamos el valor del arreglo-->
                      <input type="text" name="nombre" value="<?php echo $fut['nombre']; ?>" placeholder="" />
                    </label>
                     <label>Posicion
                      <!--asignamos el valor del arreglo-->
                      <input type="text" name="posicion" value="<?php echo $fut['posicion']; ?>" placeholder="" />
                    </label>
                     <label>Carrera
                      <!--asignamos el valor del arreglo-->
                      <input type="text" name="carrera" value="<?php echo $fut['carrera']; ?>" placeholder="" />
                    </label>
                     <label>Email
                      <!--asignamos el valor del arreglo-->
                      <input type="text" name="email" value="<?php echo $fut['email']; ?>" placeholder="" />
                    </label>
                  </div>
                  <div class="large-4 columns">
                    <label>
                      <input type="submit" class="button success" name="modificar" value="Guardar" />
                    </label>
                  </div>

                       
              </form>



              
            </div>
          </section>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>