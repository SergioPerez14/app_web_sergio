    <?php 

    //Guardado de datos en un archivo txt
        $matricula = $_POST["matricula"];
        $nombre = $_POST["nombre"];
        $carrera = $_POST["carrera"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $filename = "alumnos";
        $contenido = "$matricula,$nombre,$carrera,$email,$telefono".PHP_EOL;

        $archivo=fopen("./$filename.txt", "a");
        fwrite($archivo, $contenido);

    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title></title>
    </head>
    <body>
        <p>Alumno Guardado</p>
    </body>
    </html>