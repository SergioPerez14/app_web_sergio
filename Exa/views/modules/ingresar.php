<!--<br>
<!-- Es el inicio de sesion o login, cuenta con dos entradas de texto, para ingresar el email y la contraseña
<h4>Iniciar Sesion</h4>

<hr style="left: -50px; width: 500px; border-color: darkgray;"><br>

	<form method="post">
		
		<label>Username: </label>
		<input type="text" placeholder="Username" name="usuarioIngreso" required>

		<label>Contraseña: </label>
		<input type="password" placeholder="Contraseña" name="passwordIngreso" required>

		<input type="submit" class="button radius tiny" style="background-color: #360956; left: -1px; width: 400px;" value="Log In">

	</form>-->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POS | Login</title>
</head>
<body class="hold-transition login-page" style="background-color: #05758c;">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b style="color: white;">Sistema de Ventas</b></a>
    <hr style="border-color: white;">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <strong><p class="login-box-msg">Iniciar Sesion</p></strong>

<!-- Formulario de login -->
      <form method="post">
        <div class="form-group has-feedback">
          <label>Username: </label>
          <input type="text" class="form-control" placeholder="Username" name="usuarioIngreso">
          <span class="fa fa-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <label>Contraseña: </label>
          <input type="password" class="form-control" placeholder="Password" name="passwordIngreso">
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <input type="submit" class="btn btn-block btn-flat" style="background-color: #dd7d00; color: white;" name="acceder" value="Acceder"></input>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

</body>
</html>

<?php

//Se llama al controller de ingreso de usuario
$ingreso = new MvcController();
$ingreso -> iniciarSesionController();

//Se valida que si action es igual a fallo, se imprima un mensaje
if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

		echo "Fallo al ingresar";
	
	}

}

?>