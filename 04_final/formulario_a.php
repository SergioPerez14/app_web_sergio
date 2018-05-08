<!DOCTYPE html>
<html>
<head>  
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
</head>
<body>

    <?php require_once('header.php'); ?>
    <div class="large-9 columns"><!-- Formulario de Alumnos -->
      <form method="POST" action="guardar.php">
        Matricula: <input type="text" class="form-control" name="matricula" placeholder="Matricula">
        <br>
        Nombre: <input type="text" class="form-control" name="nombre" placeholder="Nombre">
        <br>
        Carrera: <input type="text" class="form-control" name="carrera" placeholder="Carrera">
        <br>
        E-mail: <input type="text" class="form-control" name="email" placeholder="E-mail">
        <br>
        Telefono: <input type="text" class="form-control" name="telefono" placeholder="Telefono">

        <center><button type="submit" class="btn btn-primary">Guardar</button></center>
      </form>
    </div>
</body>
</html>

    <?php require_once('footer.php'); ?>