<?php

require_once('funciones.php');

if( isset($_COOKIE)
    &&is_array($_COOKIE)
    && count($_COOKIE)>0
    && isset($_COOKIE['username'])
    && $_COOKIE['username']!=null
){
    session_start();
    //$_SESSION['username']=$_COOKIE['username'];
}


if(isset($_GET['action'])
    && $_GET['action']=='logout'){
    //session_destroy();
    unset($_SESSION['username']);
}
if (isset($_POST['formu'])){

//Imprime el array con los datos de acceso, una vez logueado
    if( isset($_POST['formu']['nombre'])
        &&isset($_POST['formu']['pass'])
        &&buscarUsuario($_POST['formu']['nombre'],$_POST['formu']['pass'])
    ){
        //session_start();
        $_SESSION['username']=$_POST['formu']['nombre'];
        setcookie("username", $_POST['formu']['nombre']);
    }

}?>
<html>
<head>
    <title>Practica 7</title>
</head>

<body>
<?php
if( isset($_SESSION)
    &&is_array($_SESSION)
    && count($_SESSION)>0
){
    ?>
    
    <?php
}

if(isset($_SESSION['username'])){
    //estoy logueado
    include_once('header.php');
    echo "<div align='center'>";
    echo "<h3>Bienvenido</h3>";
    echo "<h4>".$_SESSION['username']."</h4>";
    echo      "<div class='row'>";
    echo        "<div class='large-12 columns'>";
    echo            "<h4><b><center>Sistema de Ventas</center></b></h4>";
    echo            "<h4><b>Eliga una opcion:</b></h4>";
    echo          "<div class='section-container tabs' data-section>";
    echo           "<section class='section'>";
    echo              "<div class='content' data-slug='panel1'>";
    echo                "<div class='row'>";
    echo                "</div>";
    echo                "<table style='background-color: #gray'>";
    echo                  "<thead style='background-color: #gray'>";
    echo                    "<tr style='background-color: #gray'>";
    echo                      "<th width='200'>Usuarios</th>";
    echo                      "<th width='200'>Productos</th>";
    echo                      "<th width='200'>Ventas</th>";
    echo                    "</tr>";
    echo                  "</thead>";
    echo                  "<tbody>";

    echo                    "<tr>";
    echo                      "<tr style='background-color: #gray'>";
    echo                        "<td><a href='./usuarios.php' class='button radius tiny' style='background-color: #06515e; width: 300px'>Ir al listado</a></td>>";
    echo                        "<td><a href='./productos.php' class='button radius tiny' style='background-color: #06515e; width: 300px'>Ir al listado</a></td>";
    echo                        "<td><a href='./ventas.php' class='button radius tiny' style='background-color: #06515e; width: 300px'>Ir al listado</a></td>";
    echo                      "</tr>";                 
    echo                    "</tr>";

    echo                  "</tbody>";
    echo                "</table>";
    echo              "</div>";
    echo            "</section>";
    echo          "</div>";
    echo "</div>";
    echo "<a href='?action=logout'>Logout</a>";
    include_once('footer.php');
}else{
    //estoy deslogueado
    ?>

    <?php require_once('header2.php'); ?>
    <div class="section-container tabs" align="left" data-section>
      <section class="section">
        <div class="content" data-slug="panel1">
          <div class="row" align="center">
          </div>
          <div class="large-12 columns">
          <FORM ACTION="index.php" name="formu" METHOD="post">
          <label for="nombre" style="width: 30%; margin-left: 470px">Usuario</label>
          <input type="text" name="formu[nombre]" id="nombre" style="width: 30%; margin-left: 470px"
               


               value="<?php
               if(isset($_POST['formu']['nombre'])&&$_POST['formu']['nombre']!=null){
                   echo $_POST['formu']['nombre'];
               }
               ?>">


          <br/>
          <label for="valor" style="width: 30%; margin-left: 470px">Contraseña</label>
          <input type="text" name="formu[pass]"  id="valor" style="width: 30%; margin-left: 470px"
               

               value="<?php
               if(isset($_POST['formu']['pass'])
                   &&$_POST['formu']['pass']!=null){
                   echo $_POST['formu']['pass'];
               }
               ?>">
          <br/>
          <center><input type="submit" name="formu[enviar]" value="Iniciar Sesion" class="button radius tiny"/></center>
        </FORM>
    	</div>
      </div>
    </section>
  </div>
        
</div>

      <?php require_once('footer.php'); ?>

    <?php
}
?>



<!--

<!doctype html>
	<html class="no-js" lang="en">
	  <head>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <title>Practica 7</title>
	    <link rel="stylesheet" href="./css/foundation.css" />
	    <script src="./js/vendor/modernizr.js"></script>
	  </head>
	  <body>
	     
	    <div class="row">
	      <div class="large-12 columns">
	        	<h4><b><center>Sistema de Ventas</center></b></h4>
	          <h4><b>Eliga una opcion:</b></h4>
	        <div class="section-container tabs" data-section>
	          <section class="section">
	            <div class="content" data-slug="panel1">
	              <div class="row">
	              </div>
	              <table style="background-color: gray">
	                <thead style="background-color: #gray">
	                  <tr style="background-color: #gray">
	                    <th width="200">Usuarios</th>
	                    <th width="200">Productos</th>
	                    <th width="200">Ventas</th>
	                  </tr>
	                </thead>
	                <tbody>
	                  <tr>
		                  <tr style="background-color: #gray">
		                    <td><a href="./usuarios.php" class="button radius tiny" style="background-color: #06515e; width: 300px">Ir al listado</a></td>
		                    <td><a href="./productos.php" class="button radius tiny" style="background-color: #06515e; width: 300px">Ir al listado</a></td>
		                    <td><a href="./ventas.php" class="button radius tiny" style="background-color: #06515e; width: 300px">Ir al listado</a></td>	  
		                  </tr>                 
	                  </tr>
	                </tbody>
	              </table>
	            </div>
	          </section>
	        </div>	        	        
	      </div>
	    </div>-->
	    
	    