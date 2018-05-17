<html lang="es">
	<head>
		 <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
	</head>
	
	<body>
		 <?php require_once('header.php');?>
	     <?php require('database_details.php');?>

		<div class="container">
			<div class="row">
				<h3 style="text-align:center">Alta </h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="database_details.php" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">ID</label>
					<div class="col-sm-1">
						<input type="text" class="form-control" id="idin" name="id" placeholder="ID" required>
					</div>
				</div>

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-1">
						<input type="text" class="form-control" id="namein" value name="nombre" placeholder="Nombre" required>
					
					</div>
				</div>
				
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-1">
						<input type="email" class="form-control" id="correoin" name="email" placeholder="Email" required>
					</div>
				</div>
				
						
				
				
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index.php" class="btn btn-default">Regresar</a>
							 
						<button  class="btn btn-primary" onclick="<?php agregar(idin,namein,correoin)?>">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>


    <?php require_once('footer.php'); ?>