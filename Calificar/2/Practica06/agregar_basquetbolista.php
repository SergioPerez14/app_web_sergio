<?php 
  include_once('Config2.php');


  //Asignacion a las varibles con post de los datos en la bd
  if($_POST){

    $nombre = $_POST['Nombre'];
    $posicion = $_POST['Posicion'];
    $dorsal = $_POST['Dorsal'];
    $carrera = $_POST['Carrera'];
    $email = $_POST['Email'];

    //Se insertan los datos agregados para ser otro basquetbolista por medio de insert
    $update = $conexion->prepare(
      'INSERT INTO Basquetbolistas (Nombre, Dorsal, Posicion, Carrera, Email) VALUES (:nombre, :dorsal, :posicion, :carrera, :email)');
    $update->bindParam(':nombre', $nombre);
    $update->bindParam(':dorsal', $dorsal);
    $update->bindParam(':posicion', $posicion);
    $update->bindParam(':carrera', $carrera);
    $update->bindParam(':email', $email);
    $update->execute();

    //Alerta de basquetbolista agregado que es la que confirma
    echo '<script> alert("Basquetbolista Agregado!"); </script>';
    //redirecciona a la pagina de futbolistas
    echo '<script> window.location = "index3.php"; </script>';
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
    
    <?php require_once('header2.php'); ?>

     
    <div class="row">
 
      <div class="large-9 columns">
        <h3>Registrar basquetbolista</h3>
        
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <form method="post">
                Nombre: <input type="text" name="Nombre" value="">
                <br>
                Dorsal: <input type="text" name="Dorsal" value="">
                <br>
                Carrera: <input type="text" name="Carrera" value="">
                <br>
                Email: <input type="text" name="Email" value="">
                <br>
                Posicion: <input type="text" name="Posicion" value="">
                <br>
                <input type="submit" name="submit" value="Registrar">
            </form>
              
            </div>
          </section>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>