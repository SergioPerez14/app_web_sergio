<?php

require ('db/database_utilities.php');

if( $_POST )
{

  header('Location: basquet.php');
  //die();
  $id = isset( $_POST['id'] ) ? $_POST['id'] : '';
  $nombre = isset( $_POST['nombre'] ) ? $_POST['nombre'] : '';
  $posicion = isset( $_POST['posicion'] ) ? $_POST['posicion'] : '';
  $carrera = isset( $_POST['carrera'] ) ? $_POST['carrera'] : '';
  $email = isset( $_POST['email'] ) ? $_POST['email'] : '';

  //implementamos los parametros $email y $password de la funcion add de new_user.php
 insertarbasquet($id,$nombre,$posicion,$carrera,$email);
  //Terminamos la ejecución de los parametros
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
                 	 <label>ID
                      <!--asignamos el valor del arreglo-->
                      <input type="text" name="id"  placeholder="ID" />
                    </label>
                    <label>Nombre
                      <!--asignamos el valor del arreglo-->
                      <input type="text" name="nombre" placeholder="Nombre" />
                    </label>
                     <label>Posicion
                      <!--asignamos el valor del arreglo-->
                      <input type="text" name="posicion" placeholder="Posicion" />
                    </label>
                     <label>Carrera
                      <!--asignamos el valor del arreglo-->
                      <input type="text" name="carrera" placeholder="Carrera" />
                    </label>
                     <label>Email
                      <!--asignamos el valor del arreglo-->
                      <input type="text" name="email" placeholder="Email" />
                    </label>
                  </div>
                  <div class="large-4 columns">
                    <label>
                      <input type="submit" class="button success" name="agregar" value="Guardar" />
                    </label>
                  </div>

                       
              </form>



              
            </div>
          </section>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>