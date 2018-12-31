<?php 

class Desplazamiento{

	//atributos
	private $username;
	//metodo

	public function __construct($name){
		$this->username=$name;//asigamos el valor al atributo
	}
	public function obtener_receptor(){
		 return $this->username;//devolvemos el valor
	}


}

 ?>
