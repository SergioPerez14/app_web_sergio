<!DOCTYPE html>
<html>
<head>
	<title>Practica 1</title>
</head>
<body>
	<?php 

		$p1 = array("Name"=>"Sergio", "LastName"=>"");
		$p1["LastName"]="Perez";

		$p2 = array("Name"=>$p1["Name"], "LastName"=>$p1["LastName"]);

		echo($p1["Name"]);
		echo ("<br>");
		echo($p1["Name"]." ".$p1["LastName"]);
		echo ("<br>");
		echo($p2["Name"]." ".$p2["LastName"]);


		$array = array(4,8,12,16,20,24);
		$array = array(0=>4,1=>8,2=>12,3=>16,4=>20,5=>24);
		echo ("<br><br>");
		print_r($array);
		echo ("<br>");
		echo ("Posicion 4: "." ".$array[3]."");

		function ftn($mensaje,$name,$cant){
		if($mensaje==0)
			echo ("Hello ".$name);
		else
			echo("Greetings ".$name);
		
		for($id = 0; $id<$cant; $id++){
			echo "!";
		}

		}

		echo ("<br><br>");
		ftn(0,"Sergio",1);
		echo ("<br>");
		ftn(0,"Sergio",1);
		echo ("<br>");
		ftn(1,"Sergio",3);
		echo ("<br>");
		ftn(1,"Sergio",0);

	 ?>
</body>
</html>



