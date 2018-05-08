    <?php 
        //Guarda la informacion en variables que despues seran almacenadas en un txt
        $nempleado = $_POST["nempleado"];
        $nombre = $_POST["nombre"];
        $carrera = $_POST["carrera"];
        $telefono = $_POST["telefono"];
        $filename = "maestros";
        $contenido = "$nempleado,$nombre,$carrera,$telefono".PHP_EOL;

        $archivo=fopen("./$filename.txt", "a");
        fwrite($archivo, $contenido);

    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title></title>
    </head>
    <body>
        <p>Maestro Guardado</p>
    </body>
    </html>