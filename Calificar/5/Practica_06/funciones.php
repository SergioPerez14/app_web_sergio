<?php
    include("conexion.php");//Manda llamar la conexión a la base de datos

    $total_users;
    $total_status;
    $total_logged;
    $total_users_type;
    $total_active_users;
    $total_inactive_users;
    $user;
    $status;
    $user_status;
    $log;
    $user_log;
    $type;
    $user_type;

    function total_usuarios()
    {
        global $total_users;
        global $pdo;
        //TOTAL DE USUARIOS
        $querySql = "SELECT COUNT(*) as total_users FROM user";//Se declara una variable que contendra la cadena de la consulta para obtener el total de usuarios
        $stmt = $pdo->prepare($querySql);//Declaracion de una variable la cual contendra la varibale que represetnara PDO en el archivo "connection.php" y recibira como parametro la consulta anterior
        $stmt->execute();//Se ejecutara la consulta con PDO
        $res = $stmt->fetchAll();//Se asigna el resultado de la consulta como un array asociativo
        $total_users = $res[0]['total_users'];//El resultado del array en la fila 0,con el identificador de "total_users" se asigna a una variable, ya solo recogera el total(numero) de los usuarios     
    }
    
    function total_estatus()
    {
        global $total_status;
        global $pdo;
        //TOTAL DE STAUTS
        $querySql = "SELECT COUNT(*) as total_status FROM status";//Se declara una variable que contendra la cadena de la consulta para obtener el total de status
        $stmt = $pdo->prepare($querySql);//Declaracion de una variable la cual contendra la varibale que represetnara PDO en el archivo "connection.php" y recibira como parametro la consulta anterior
        $stmt->execute();//Se ejecutara la consulta con PDO
        $res = $stmt->fetchAll();//Se asigna el resultado de la consulta como un array asociativo
        $total_status = $res[0]['total_status'];//El resultado del array en la fila 0,con el identificador de "total_status" se asigna a una variable, ya solo recogera el total(numero) de los status
    }

    function total_logeados()
    {
        global $total_logged;
        global $pdo;
        //TOTAL DE USUARIOS LOGGEADOS
        $querySql = "SELECT COUNT(*) as total_logged FROM user_log";//Se declara una variable que contendra la cadena de la consulta para obtener el total de usuarios loggeados
        $stmt = $pdo->prepare($querySql);//Declaracion de una variable la cual contendra la varibale que represetnara PDO en el archivo "connection.php" y recibira como parametro la consulta anterior
        $stmt->execute();//Se ejecutara la consulta con PDO
        $res = $stmt->fetchAll();//Se asigna el resultado de la consulta como un array asociativo
        $total_logged = $res[0]['total_logged'];//El resultado del array en la fila 0,con el identificador de "total_logged" se asigna a una variable, ya solo recogera el total(numero) de los usuarios loggeados
    }

    function total_usuarios_tipo()
    {
        global $total_users_type;
        global $pdo;
        //TOTAL DE TIPOS DE USURIOS
        $querySql = "SELECT COUNT(*) as total_users_type FROM user_type";//Se declara una variable que contendra la cadena de la consulta para obtener el total de tipos de usuarios
        $stmt = $pdo->prepare($querySql);//Declaracion de una variable la cual contendra la varibale que represetnara PDO en el archivo "connection.php" y recibira como parametro la consulta anterior
        $stmt->execute();//Se ejecutara la consulta con PDO
        $res = $stmt->fetchAll();//Se asigna el resultado de la consulta como un array asociativo
        $total_users_type = $res[0]['total_users_type'];//El resultado del array en la fila 0,con el identificador de "total_users_type" se asigna a una variable, ya solo recogera el total(numero) de los tipos de usuarios 
    }

    //--------------------------------------------------------------------------------------------------------------------------------------------------

    function total_usuarios_activos()
    {
        global $total_active_users;
        global $pdo;
        //TOTAL DE USUARIOS ACTIVOS
        $querySql = "SELECT COUNT(*) as total_active_users FROM user where status_id = 1";//Se declara una variable que contendra la cadena de la consulta para obtener el total de usuarios activos
        $stmt = $pdo->prepare($querySql);//Declaracion de una variable la cual contendra la varibale que represetnara PDO en el archivo "connection.php" y recibira como parametro la consulta anterior
        $stmt->execute();//Se ejecutara la consulta con PDO
        $res = $stmt->fetchAll();//Se asigna el resultado de la consulta como un array asociativo
        $total_active_users = $res[0]['total_active_users'];//El resultado del array en la fila 0,con el identificador de "total_active_users" se asigna a una variable, ya solo recogera el total(numero) de los usuarios activos
    }    

    function total_usuarios_inactivos()
    {
        global $total_inactive_users;
        global $pdo;
        //TOTAL DE USUARIOS INACTIVOS
        $querySql = "SELECT COUNT(*) as total_inactive_users FROM user WHERE status_id <>1";//Se declara una variable que contendra la cadena de la consulta para obtener el total de usuarios inactivos
        $stmt = $pdo->prepare($querySql);//Declaracion de una variable la cual contendra la varibale que represetnara PDO en el archivo "connection.php" y recibira como parametro la consulta anterior
        $stmt->execute();//Se ejecutara la consulta con PDO
        $res = $stmt->fetchAll();//Se asigna el resultado de la consulta como un array asociativo
        $total_inactive_users = $res[0]['total_inactive_users'];//El resultado del array en la fila 0,con el identificador de "total_inactive_users" se asigna a una variable, ya solo recogera el total(numero) de los usuarios inactivos
    }

    function usuarios()
    {
        global $user;
        global $pdo;
        //DATOS TABLA USUARIOS
        $querySql = "SELECT *  FROM user";//Se declara una variable que contendra la cadena de la consulta para obtener todo el contenido de la tabla usuario
        $stmt = $pdo->prepare($querySql);//Declaracion de una variable la cual contendra la varibale que represetnara PDO en el archivo "connection.php" y recibira como parametro la consulta anterior
        $stmt->execute();//Se ejecutara la consulta con PDO
        $user = $stmt->fetchAll();//Se asigna el resultado de la consulta como un array asociativo
    }

    function estatus()
    {
        global $status;
        global $pdo;
        //DATOS TABLA STATUS
        $querySql = "SELECT *  FROM status";//Se declara una variable que contendra la cadena de la consulta para obtener todo el contenido de la tabla status
        $stmt = $pdo->prepare($querySql);//Declaracion de una variable la cual contendra la varibale que represetnara PDO en el archivo "connection.php" y recibira como parametro la consulta anterior
        $stmt->execute();//Se ejecutara la consulta con PDO
        $status = $stmt->fetchAll();//Se asigna el resultado de la consulta como un array asociativo
    }

    function usuario_estatus()
    {
        global $user_status;
        global $pdo;
        $querySql = "SELECT s.name  FROM user as u INNER JOIN status as s WHERE u.status_id = s.id";//Se realiza esta consulta para saber cual es el status de cada usuario, esta consulta se realiza para poder mostrar mejor el contenido de las tablas
        $stmt = $pdo->prepare($querySql);//Declaracion de una variable la cual contendra la varibale que represetnara PDO en el archivo "connection.php" y recibira como parametro la consulta anterior
        $stmt->execute();//Se ejecutara la consulta con PDO
        $user_status = $stmt->fetchAll();//Se asigna el resultado de la consulta como un array asociativo
    }

    
    function loguear()
    {
        global $log;
        global $pdo;
        //DATOS TABLE USER LOG
         $querySql = "SELECT *  FROM user_log";//Se declara una variable que contendra la cadena de la consulta para obtener todo el contenido de la tabla user_log
        $stmt = $pdo->prepare($querySql);//Declaracion de una variable la cual contendra la varibale que represetnara PDO en el archivo "connection.php" y recibira como parametro la consulta anterior
        $stmt->execute();//Se ejecutara la consulta con PDO
        $log = $stmt->fetchAll();//Se asigna el resultado de la consulta como un array asociativo
    }
    
    function usuarios_logueados()
    {
        global $user_log;
        global $pdo;
        $querySql = "SELECT u.email  FROM user as u INNER JOIN user_log as l WHERE u.id = l.user_id";//Se realiza esta consulta para saber cuando se ha loggeado un usuario, esta consulta se realiza para poder mostrar de una mejor manera el contenido de las tablas
        $stmt = $pdo->prepare($querySql);//Declaracion de una variable la cual contendra la varibale que represetnara PDO en el archivo "connection.php" y recibira como parametro la consulta anterior
        $stmt->execute();//Se ejecutara la consulta con PDO
        $user_log = $stmt->fetchAll();//Se asigna el resultado de la consulta como un array asociativo
    }    
    
    function tipos()
    {
        global $type;
        global $pdo;
        //DATOS TABLE USER TYPE
        $querySql = "SELECT *  FROM user_type";//Se declara una variable que contendra la cadena de la consulta para obtener todo el contenido de la tabla user_type
        $stmt = $pdo->prepare($querySql);//Declaracion de una variable la cual contendra la varibale que represetnara PDO en el archivo "connection.php" y recibira como parametro la consulta anterior
        $stmt->execute();//Se ejecutara la consulta con PDO
        $type = $stmt->fetchAll();//Se asigna el resultado de la consulta como un array asociativo
    }

    function tipos_usuarios()
    {
        global $user_type;
        global $pdo;
        $querySql = "SELECT t.name FROM user AS u INNER JOIN user_type AS t WHERE u.user_type_id = t.id";//Se realiza esta consulta para saber que tipo de usuario es cada usuario, esta consulta se raliza con el proposito de poder mostrar de una mejor manera las tablas
        $stmt = $pdo->prepare($querySql);//Declaracion de una variable la cual contendra la varibale que represetnara PDO en el archivo "connection.php" y recibira como parametro la consulta anterior
        $stmt->execute();//Se ejecutara la consulta con PDO
        $user_type = $stmt->fetchAll();//Se asigna el resultado de la consulta como un array asociativo
    }
    
?>