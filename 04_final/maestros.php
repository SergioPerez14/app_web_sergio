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

    <h2>Menu Principal - Maestros</h2>

      <div>
        <h3>Listado</h3>
        <ul><!-- Redirecciona al listado de maestros -->
          <a href="./listado_m.php" class="button">Ir al listado</a>
        </ul>
      </div>

      <div>
        <h3>Formulario</h3>
        <ul><!-- Redirecciona al formulario de maestros -->
          <a href="./formulario_m.php" class="button">Ir al formualrio</a>
        </ul>
      </div>

        <?php require_once('footer.php'); ?>

  </body>
</html>