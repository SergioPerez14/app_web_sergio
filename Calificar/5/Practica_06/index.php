<!--Mandamos llamar  las funciones que estan en funciones.php para las consultas qjue se necesitan-->
<?php include("funciones.php"); 
//Llamado a todas las funciones para traer los arrays con los valores correspodientes a cada consulta
total_usuarios();
total_estatus();
total_logeados();
total_usuarios_tipo();
total_usuarios_activos();
total_usuarios_inactivos();
usuarios();
estatus();
usuario_estatus();
loguear();
usuarios_logueados();
tipos();
tipos_usuarios();
?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Practica 06: Ejercicio 1</title>
        <link rel="stylesheet" href="../css/foundation.css" />
        <script src="../js/vendor/modernizr.js"></script>
    </head>
    <body>
        <!--Mandamos llamar el header-->
        <?php require_once('header.php'); ?>
        
        <div class="row"> 
            <div class="large-12 columns" align="center">
                <div class="section-container tabs" data-section>
                    <section class="section">
                        <div class="content" data-slug="panel1">
                            <div class="row">
                                <H1>TOTAL</H1>
                                <table>
                                    <thead>
                                        <tr>
                                            <th width="200">Usuarios</th>
                                            <th width="250">Tipos</th>
                                            <th width="250">Status</th>
                                            <th width="250">Accesos</th>
                                            <th widht="250">Usuarios Activos</th>
                                            <th widht="250">Usuarios Inactivos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr> 
                                            <!--Total de usuarios, tipos, estatus,logueados, usuarios activos e inactivos-->
                                            <td><?php echo $total_users;?></td>
                                            <td><?php echo $total_users_type;?></td>
                                            <td><?php echo $total_status;?></td>
                                            <td><?php echo $total_logged;?></td>
                                            <td><?php echo $total_active_users;?></td>
                                            <td><?php echo $total_inactive_users;?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </section>

                    <!--TABLA USUARIOS-->
                    <section class="section">
                        <h3>Contenido Tabla Usuarios</h3>
                         <div class="content" data-slug="panel1">
                            <div class="row">
                                <table>
                                    <thead>
                                        <tr>
                                            <th width="200">ID</th>
                                            <th width="250">E-Mail</th>
                                            <th width="250">Password</th>
                                            <th width="250">Stauts</th>
                                            <th widht="250">UserType</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=0;
                                            while($i<$total_users){//Mientras el contador sea menor a la Cantidad de usuarios funcionara
                                        ?>
                                            <tr> 
                                                <!--Traemos los campos correspondientes del id email, password, estatus id y tipo de id-->
                                                <td><?php echo $user[$i]['id']?></td>
                                                <td><?php echo $user[$i]['email'];?></td>
                                                <td><?php echo $user[$i]['password'];?></td>
                                                <td><?php echo $user[$i]['status_id']. " - " . $user_status[$i]['name'];?></td>
                                                <td><?php echo $user[$i]['user_type_id']. " - " . $user_type[$i]['name'];?></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                    </section>

                     <!--tabla status-->
                    <section class="section">
                        <h3>Contenido Tabla Status</h3>
                         <div class="content" data-slug="panel1">
                            <div class="row">
                                <table>
                                    <thead>
                                        <tr>
                                            <th width="200">ID</th>
                                            <th width="250">Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=0;
                                            while($i<$total_status){
                                        ?>
                                            <tr> 
                                                <!--imprimimos los campos id y nombre-->
                                                <td><?php echo $status[$i]['id']?></td>
                                                <td><?php echo $status[$i]['name'];?></td>
                                            </tr>
                                        <?php
                                            $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                    </section>
                    <!--TABLA DE USSER LOG-->
                    <section class="section">
                        <h3>Contenido Tabla User Log</h3>
                         <div class="content" data-slug="panel1">
                            <div class="row">
                                <table>
                                    <thead>
                                        <tr>
                                            <th width="200">ID</th>
                                            <th width="250">Fecha de Sesion</th>
                                            <th width="250">Usuario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=0;
                                            while($i<$total_logged){
                                        ?>
                                            <tr> 
                                                <!--Mientras el ciclo este funcionando estara imrimiendo los valores de id, fecha d logueo y id dde usuario-->
                                                <td><?php echo $log[$i]['id']?></td>
                                                <td><?php echo $log[$i]['date_logged_in'];?></td>
                                                <td><?php echo $log[$i]['user_id'] . " - " . $user_log[$i]['email'];?></td>
                                            </tr>
                                        <?php
                                            $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                    </section>

                     <!--tabla de tipos de usuarios-->
                    <section class="section">
                        <h3>Contenido Tabla User Type</h3>
                         <div class="content" data-slug="panel1">
                            <div class="row">
                                <table>
                                    <thead>
                                        <tr>
                                            <th width="200">ID</th>
                                            <th width="250">Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=0;//Controlador del ciclo
                                            while($i<$total_status){//Mientras el contador sea menor a total status...
                                        ?>
                                            <tr> 
                                                <!--Se estaran imprimiendo los valores de id y nomhbre-->
                                                <td><?php echo $type[$i]['id']?></td>
                                                <td><?php echo $type[$i]['name'];?></td>
                                            </tr>
                                        <?php
                                            $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                    </section>
                </div>
            </div>
        </div>
        <!--Mandamos llamar el footer-->
    <?php require_once('footer.php'); ?>