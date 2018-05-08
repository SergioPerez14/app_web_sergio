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
  	
    <!-- Menu Principal -->
  	<h2>Menu Principal</h2>
      <div>
      	<h3>Maestros</h3>
        <ul><!-- Redirecciona al menu de los maestros -->
          <a href="./maestros.php" class="button">Maestros</a>
        </ul>
      </div>

      <div>
      	<h3>Alumnos</h3>
        <ul><!-- Redirecciona al menu de los alumnos -->
          <a href="./alumnos.php" class="button">Alumnos</a>
        </ul>
      </div>
	<?php require_once('footer.php'); ?>
  </body>
</html>
