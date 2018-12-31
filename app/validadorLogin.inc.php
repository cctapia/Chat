<?php 

class ValidadorLogin{
	//atributos
	private $user;
	private $password;

	//atributos de error
	private $error_user;
	private $error_password;
	//metodos


	public function __construct($usuario,$contrasena){

	$this->error_user=$this->validar_user($usuario);
	$this->error_password=$this->validar_password($contrasena);

	}
	public function validar_variable($var){
		if(isset($var) && !empty($var)){
			return true;
		}else{
			return false;
		}
	}
	public function validar_user($u){
		if($this->validar_variable($u)==false){
			return "Falta el usuario";
		}else{
			if($u[0]!=="@"){
				return "El nombre de usuario debe comenzar por arroba";
			}else{
				$this->user=$u;
				return "";
			}
		}
	}
	public function obtener_user(){
		return $this->user;
	}
	public function obtener_password(){
		return $this->password;
	}

	public function validar_password($p){
		if($this->validar_variable($p)==false){
			return "Falta la contraseña";
		}else{
			$this->password=$p;
			return "";
		}
	}
	public function formatoHTML($var){
		return "<div class='alert alert-danger formato'>$var</div>";
	}
	public function mostrar_error_user(){
		if($this->error_user!==""){
			echo $this->formatoHTML($this->error_user);
		}
	}
	public function mostrar_error_password(){
		if($this->error_password!==""){
		echo $this->formatoHTML($this->error_password);
		}
	}
	public function todoescorrecto(){//este metodo sera booleano
		if($this->error_user=="" && $this->error_password==""){
			return true;//devolvemos en caso de que todo sea correcto
		}else{
			return false;
		}
	}









}


 ?>