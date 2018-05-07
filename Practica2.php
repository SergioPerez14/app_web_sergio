<!DOCTYPE html>
<html>
<head>
	<title>Practica 2</title>
</head>
<body>
	<?php 

		echo "<strong>Ejercicio 1</strong>";
		echo ("<br>");
		$array = array(7,5,13,6,2,1,3,16,8,4);
		print_r($array);
		echo ("<br>");
		echo "Array en Ascendente";
		sort($array);
		echo ("<br>");
		print_r($array);
		echo ("<br>");
		echo "Array en Descendente";
		rsort($array);
		echo ("<br>");
		print_r($array);
		echo ("<br><br>");

		echo "<strong>Ejercicio 2</strong>";
		echo ("<br>");
		function ftn_name($name,$ciudad){
			echo "Soy <strong>$name</strong> y naci en $ciudad";
		}
		ftn_name("Sergio Perez","Ciudad Victoria");
		echo ("<br><br>");

		echo "<strong>Ejercicio 3</strong>";
		echo "<br>";
		$array2 = array(4,2,15,6,3,1,7,11,8,9);
		echo "Array: ";
		for ($id=0; $id < 10; $id++) { 
			echo ($array2[$id]);
			if ($id==9)
				echo ".";
			else
				echo ",";
		}
	 ?>
</body>
</html>



