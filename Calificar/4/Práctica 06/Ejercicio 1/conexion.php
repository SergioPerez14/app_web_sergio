<?php
//bloque para conectarse a la base de datos mediante una excepción que pueda arrojar el error en caso de que ocurra
try{
			$conn = new PDO('mysql:host=localhost;dbname=usuarios', 'root', '');

			
		}
		catch(PDOException $ex){
			print 'Error: '.$ex->getMessage().'<br>';
			die();

		}

?>