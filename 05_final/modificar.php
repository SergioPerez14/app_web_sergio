<?php
  //El archivo database_utilities es requerido debido a que contiene las funciones para el manejo de los registros en el listado
  require_once('database_utilities.php');

  //Se realiza la obtencion de los datos a partir del id del usuario a modificar
  $id = isset( $_GET['id'] ) ? $_GET['id'] : '';
  $resultados = busqueda_id($id);  

  //Cuando se presione el boton de guardar, entonces se guardaran los cambios, es decir que asignara los datos para guardarlos en variables y 
  //estas sean los parametros para la funcion de modificar
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

    //Se llama el metodo modificar para actualizar los datos
    modificar($id,$correo,$password);
    
    //Direcciona al index.php o inicio del listado
    header("location: index.php");
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
        <h3>Formulario de Estudiante</h3>
        <br><br>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <form method="POST">
              <label>Correo Electronico:  </label>
              <input type="email" name="email" value="<?php echo $resultados['correo']?>">
              <br>
              <label>Password: </label>
              <input type="text" name="password" value='<?php echo $resultados['password']?>'>
              <br>
              <input type="submit" name="guardar" value="GUARDAR" class="button" onClick=mensaje();>
              </form>
            </div>
          </section>
        </div>
        
      </div>
    

    <?php require_once('footer.php'); ?>


    <script type="text/javascript">

      //Funcion que envia un mensaje de que el registro se actualizo
      function mensaje()
      {
        alert("Registro actualizado");
      }
    </script>