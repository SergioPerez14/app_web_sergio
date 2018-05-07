<!DOCTYPE html>
<html>
<head>
	<title>Practica 3</title>
</head>
<body>
	<?php 

		//Clase Fibonacci
		class Fibonacci{
			
			//Declaracion de los arrays original y resultante
			public $array;
			public $arrayR;

			//Constructor de la clase Fibonacci
			function __construct()
			{
				$this->array = array(10,9,4,6,9,7,8,4,6,5,2,3,1,6,8,5,1,6,5,1,5,4,2,4,9);
			}

			//Metodo o funcion que es donde se pasara el array y aplicar la serie Fibonacci con el array original
			function ftn(){
				$this->arrayR[0] = $this->array[0];
				$this->arrayR[1] = $this->array[1];
				for ($i=2; $i < 25; $i++) { 
					$this->arrayR[$i] = $this->arrayR[$i-1] + $this->arrayR[$i-2];
				}
				echo "<strong>Array Original: </strong>";
				for ($i=0; $i < 25; $i++) {
					echo($this->array[$i]);
					if ($i==24)
						echo ".";
					else
						echo ",";
				}
				echo "<br><br>";
				echo "<strong>Array Fibonacci: </strong>";
				for ($i=0; $i < 25; $i++) { 
					echo($this->arrayR[$i]);
					if ($i==24)
						echo ".";
					else
						echo ",";
				}
			}

		}

		//Declaracion de un objeto de tipo Fibonacci y llamada del metodo ftn
		$a = new Fibonacci();
		$a -> ftn();

	 ?>

</body>
</html>