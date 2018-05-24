<br>

<h4>Iniciar Sesion</h4>

<hr style="left: -50px; width: 500px; border-color: darkgray;"><br>

	<form method="post">
		
		<input type="text" placeholder="Usuario" name="usuarioIngreso" required>

		<input type="password" placeholder="Contraseña" name="passwordIngreso" required>

		<input type="submit" class="button radius tiny" style="background-color: #360956; left: -1px; width: 400px;" value="Log In">

	</form>

<?php

$ingreso = new MvcController();
$ingreso -> ingresoMaestroController();

if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

		echo "Fallo al ingresar";
	
	}

}

?>