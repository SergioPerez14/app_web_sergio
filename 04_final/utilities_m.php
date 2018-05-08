<?php
//Manipulacion de archivo txt, donde con foreach se navega y con explode se recorta las lineas, despues se hace un recorte dependiendo de las comas entre los datos que se ingresaron.
    foreach(file('maestros.txt') as $f){
        $line = explode(PHP_EOL, $f);
        $user_access[] = [
            'nempleado' => explode(",", $line[0])[0],
            'name' => explode(",", $line[0])[1],
            'carrera' => explode(",", $line[0])[2],
            'telefono' => explode(",", $line[0])[3]  
        ];
    }
?>