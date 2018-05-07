<?php 
	/*CLASE
		Es un modelo que se utiliza para crear objetoc que COMPARTEN un mismo comportamiento, estado e identidad.
	*/

	class Automovil{
		/*
			PROPIEDADES:
			Son las caracterisitcas que pueden tener un objeto.
		*/
		public $marca;
		public $modelo;
		/*
			MODELO:
			Es el algoritmo asociado a un objeto que indica de lo que éste puede hacer.
			La unica diferencia entre método y función, es que llamamos metodos a las funciones de una CLASE(en POO), mientras que llamamos funciones a los algoritmos de Programacion Estructurada
		*/
		public function mostrar($marca,$modelo){
			#this hace  referencia al objeto actual (Automovil)
			echo "<p> Hola! soy un $this->marca, de modelo $this->modelo</p>";
		}
	}
	/*
		OBJETO
		Es el algoritmo asociado a un objeto que indica la capacidad de lo que éste hace. Asi mismo en la entidad provista de métodos o mensajes de los cuales responde a las propiedades con VALORES CONCRETOS
	*/
	$a = new Automovil();
	$a -> $marca="Toyota";
	$a -> $modelo="Corolla";
	$a -> mostrar();

	$b = new Automovil();
	$b -> $marca="Ford";
	$b -> $modelo="Fiesta";
	$b -> mostrar();

	/*
	PRINCIPIOS DE OOP:
	-ABSTRACCION
	Nuevos tipos de datos creados por el usuario
	-ENCAPSULAMIENTO
	Organizacion del codigo en grupos lógicos
	-OCULTAMIENTO
	Oculta detalles de implementacion y se exponen lo necesario



?>