<?

?>

<!DOCTYPE html>
<html>
<head>
	<title>Practica 11</title>
	<link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
</head>
<body>

	<div class="row">
		<div class="large-12 columns">
        <br><br>
        <center><h4>CONVERTIDOR Y CODIFICADOR DE CODIGOS EN LINEA</h4></center>
        <br><br>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <form method="POST">
              <label>Binario:  </label>
              <input type="text" name="binario">
              <br>
              <label>Octal: </label>
              <input type="text" name="octal">
              <br>
              <label>Decimal: </label>
              <input type="text" name="octal">
              <br>
              <label>Hexadecimal: </label>
              <input type="text" name="octal">
              <br>
              <input type="submit" name="codificar" value="Codificar" class="button radius tiny success" onClick=mensaje(); >
              </form>
            </div>
          </section>
        </div>
	</div>

</body>
</html>