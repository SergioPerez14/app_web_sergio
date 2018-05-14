<?php

  //El archivo database_utilities es requerido debido a que contiene las funciones para el manejo de los registros en el listado
  require_once('connection.php');

  //Cuando se presione el boton de guardar se almacenaran los datos en las variables que se mandaran como parametros a la funcion de añadir
  if(isset($_POST["guardar"]))
  {
    if(isset($_POST["email"])) 
    {
      $correo =  $_POST["email"];
    }

    if(isset($_POST["password"]))
    {
      $password = $_POST["password"];
    }

    //Se llama el metodo añadir para agregar un nuevo usuario 
    añadir($correo,$password);

    //Direcciona al index.php o inicio del listado
    header("Location: index.php");
  }


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
        <br><br>
        <h3>Formulario de Alumnos</h3>
        <br><br>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <form method="POST">
              <label>Correo Electronico:  </label>
              <input type="email" name="email">
              <br>
              <label>Password: </label>
              <input type="text" name="password">
              <br>
              <input type="submit" name="guardar" value="Guardar" class="button radius tiny success" onClick=mensaje(); >
              </form>
            </div>
          </section>
        </div>
        
      </div>
    

    <?php require_once('footer.php'); ?>


    <script type="text/javascript">

      //Funcion que envia un mensaje o alerta de que se añadio el registro
      function mensaje()
      {
        alert("Registro añadido");
      }
    </script>