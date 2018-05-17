<?php

try{
			$conn = new PDO('mysql:host=localhost;dbname=deportes', 'root', '');

		}
		catch(PDOException $ex){
			print 'Error: '.$ex->getMessage().'<br>';
			die();

		}

?>