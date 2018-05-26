<br>

<h4>Convertidor</h4>

<hr style="left: -50px; width: 500px; border-color: darkgray;"><br>

	<form method="POST">
      <label>Binario:  </label>
      <input type="text" name="binario">
      <br>
      <label>Octal: </label>
      <input type="text" name="octal">
      <br>
      <label>Decimal: </label>
      <input type="text" name="decimal">
      <br>
      <label>Hexadecimal: </label>
      <input type="text" name="hexadecimal">
      <br>
	  <input type="submit" class="button radius tiny" style="background-color: #360956; left: -1px; width: 400px;" value="Calcular">

	</form>

<?php

$ingreso = new MvcController();
$ingreso -> calcularDecimal();

?>