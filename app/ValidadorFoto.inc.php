<?php 
class ValidadorImagen{//definimos una clase (molde , una maqueta de objeto)

	//atributos
	private $fotoPerfil;

	//atributos de error
	private $error_fotoperfil;

	//metodos


	public function __construct($foto){
		$this->error_fotoperfil=$this->validar_fotoperfil($foto);

	}



	public function validar_variable($var){
		if(isset($var) && !empty($var)){
			return true;//true cuando es correcto
		}else{
			return false;//false cuando es incorrecto;

		}

	}
	public function validar_fotoperfil($foto){
		if(!$this->validar_variable($foto)){
		return "Falta la foto de perfil";
		}else{
			$this->fotoPerfil=$foto;
			return "";
		}
	}
	public function todoescorrecto(){
		if($this->error_fotoperfil===""){
			return true;//true en caso de Correcto
		}else{
			return false;//en caso de que no es correcto
		}
	}

	public function obtener_fotoperfil(){
		return $this->fotoPerfil;
	}



}

 ?>