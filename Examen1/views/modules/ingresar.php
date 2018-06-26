<br>
<!-- Es el inicio de sesion o login, cuenta con dos entradas de texto, para ingresar el email y la contraseña -->
<h4>Iniciar Sesion</h4>

<hr style="left: -50px; width: 500px; border-color: darkgray;"><br>

	<form method="post">
		
		<label>Email: </label>
		<input type="text" placeholder="Email" name="usuarioIngreso" required>

		<label>Contraseña: </label>
		<input type="password" placeholder="Contraseña" name="passwordIngreso" required>

		<input type="submit" class="button radius tiny" style="background-color: #360956; left: -1px; width: 400px;" value="Log In">

	</form>

<?php

//Se llama al controller de ingreso de maestro
$ingreso = new MvcController();
$ingreso -> ingresoSesionController();

//Se valida que si action es igual a fallo, se imprima un mensaje
if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

		echo "Fallo al ingresar";
	
	}

}

?>