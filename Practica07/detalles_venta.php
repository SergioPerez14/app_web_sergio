<?php
include_once('funciones.php');
$id = isset( $_GET['id'] ) ? $_GET['id'] : '';

$filas = querydetalles($id);

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
 
      <div class="large-9 columns">
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <ul class="pricing-table">
                <li class="title">Detalle de venta</li>
                <?php foreach( $filas as $fila ){ ?>
                <li class="description">
                Nombre: <?php echo $fila['nombre'] ?><br>
                Cantidad: <?php echo $fila['cantidad'] ?><br>
                Promedio de Prenda <?php echo $fila['preciounitario'] * $fila['cantidad'] / $fila['cantidad'] ?><br>
                Sumatoria: <?php echo $fila['preciounitario'] * $fila['cantidad'] ?>
                </li>
                <?php } ?>
              </ul>
            </div> 
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>