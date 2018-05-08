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

<!-- Menu Principal de los Alumnos -->
  	<h2>Menu Principal - Alumnos</h2>

      <div>
      	<h3>Listado</h3>
        <ul><!-- Redirecciona al listado de los alumnos -->
          <a href="./listado_a.php" class="button">Ir al listado</a>
        </ul>
      </div>

      <div>
      	<h3>Formulario</h3>
        <ul><!-- Redirecciona al formulario -->
          <a href="./formulario_a.php" class="button">Ir al formulario</a>
        </ul>
      </div>

        <?php require_once('footer.php'); ?>

  </body>
</html>