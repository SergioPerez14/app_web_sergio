<?php 
  //Se referencia al archivo de conexion de la  base de datos
  include_once('Config2.php'); 
  $Id = isset( $_GET['Id'] ) ? $_GET['Id'] : '';
  //en esta consulta se obtienen los datos de los basquetbolistas
  $datos_fut = $conexion->prepare('SELECT * FROM Basquetbolistas WHERE Id = :Id');
  $datos_fut->bindParam(':Id',$Id);
  //se ejecuta la consulta
  $datos_fut->execute();
  $datos_fut = $datos_fut->fetchAll();

  //Asignacion en las variables para la actualizacion 
  if($_POST){

    $nombre = $_POST['Nombre'];
    $posicion = $_POST['Posicion'];
    $dorsal = $_POST['Dorsal'];
    $carrera = $_POST['Carrera'];
    $email = $_POST['Email'];
    
    //Update de los datos modificados del basquetbolista
    $update = $conexion->prepare(
      'UPDATE Basquetbolistas SET Nombre = :nombre, Dorsal = :dorsal, Posicion = :posicion, Carrera = :carrera, Email = :email WHERE Id = :id');
    $update->bindParam(':nombre', $nombre);
    $update->bindParam(':dorsal', $dorsal);
    $update->bindParam(':posicion', $posicion);
    $update->bindParam(':carrera', $carrera);
    $update->bindParam(':email', $email);
    $update->bindParam(':id', $Id);
    $update->execute();


    //Alertas de confirmacion de modificado
    echo '<script> alert("Basquetbolista Modificado!"); </script>';
    //Redireccion de la pagina donde estan los futbolistas
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
        <h3>Modificar basquetbolista</h3>

        
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <form method="post">
                <!-- se imprimen los datos de la consulta en las cajas de texto-->
                Id: <input type="text" name="Id" disabled value="<?php echo $datos_fut[0]['Id']; ?>">
                <br>
                Nombre: <input type="text" name="Nombre" value="<?php echo $datos_fut[0]['Nombre']; ?>">
                <br>
                Dorsal: <input type="text" name="Dorsal" value="<?php echo $datos_fut[0]['Dorsal']; ?>">
                <br>
                Carrera: <input type="text" name="Carrera" value="<?php echo $datos_fut[0]['Carrera']; ?>">
                <br>
                Email: <input type="text" name="Email" value="<?php echo $datos_fut[0]['Email']; ?>">
                <br>
                Posicion: <input type="text" name="Posicion" value="<?php echo $datos_fut[0]['Posicion']; ?>">
                <br>
                <input type="submit" name="submit" value="Modificar">
            </form>
              
            </div>
          </section>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>