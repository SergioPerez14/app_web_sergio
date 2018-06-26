<!--Es la plantilla que vera el usuario al ejecutar la aplicación -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Practica 08</title>
    <link rel="stylesheet" href="views/css/foundation.css" />
    <script src="views/js/vendor/modernizr.js"></script>
    <script src="views/js/vendor/jquery.js"></script>
    <link rel="stylesheet" href="views/css/select2.min.css" />
    <script src="views/js/select2.min.js"></script>
    <script src="views/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="views/css/jquery.dataTables.min.js">
	<style>

		nav{
			position:relative;
			margin:auto;
			width:100%;
			height:auto;
			background:#360956;
		}

		nav ul{
			position:relative;
			margin:auto;
			width:90%;
			text-align: center;
		}

		nav ul li{
			display:inline-block;
			width:15%;
			line-height: 50px;
			list-style: none;
		}

		nav ul li a{
			color:white;
			text-decoration: none;
		}

		section{
			position: relative;
			margin: auto;
			width:400px;
		}

		section h1{
			position: relative;
			margin: auto;
			padding:10px;
			text-align: center;
		}

		section form{
			position:relative;
			margin:auto;
			width:400px;
		}

		section form input{
			display:inline-block;
			padding:10px;
			width:95%;
			margin:5px;
		}

		section form input[type="submit"]{
			position:relative;
			margin:20px auto;
			left:4.5%;

		}

		table, hr{
			position:relative;
			margin:auto;
			width:800px;
			left:-200px;
		}

		h4{
			text-align: center;
		}

		table thead tr{
			padding:10px;
		}

		table tbody tr td{
			padding:10px;
		}

		th{
			width: 400px;
		}

	</style>

</head>

<body>




<section>

<?php 
ob_start();

$mvc2 = new MvcController();
$mvc2 -> checarIngresoController();

$mvc = new MvcController();
$mvc -> enlacesPaginasController();

 ?>

</section>
	
</body>

</html>