<?php 

class ValidadorRegistro{
	//atributos
	private $nombre_usuario;
	private $contrasena;
	private $adicional;
	private $correo;
	

	//atributos para capaturar el error
	private $error_nombre_usuario;
	private $error_contrasena;
	private $error_repcontrasena;
	private $error_adicional;
	private $error_correo;

	//metodos
	
	public function __construct($username,$password1,$password2,$aditional,$mail){
		$this->error_nombre_usuario=$this->validar_nombre_usuario($username);
		$this->error_contrasena=$this->validar_contrasena1($password1);
		$this->error_repcontrasena=$this->validar_contrasena2($password1,$password2);
		$this->error_adicional=$this->validar_adicional($aditional);
		$this->error_correo=$this->validar_correo($mail);
	}


	public function validar_variable($variable){
		if(isset($variable) && !empty($variable)){
			return true;//esta bien
		}else{
			return false;///esta mal
		}
	}
	public function validar_nombre_usuario($user){
		if($this->validar_variable($user)==false){
			return "Falta poner el nombre de usuario";
		}else{

			if($user[0]!="@"){
			return "Debe comenzar por el caracter @";

			}else{
				if(strlen($user)>=10){
				return "El nombre debe contener como maximo 9 caracteres";

			}else{
					$this->nombre_usuario=$user;
					return "";
			}
			}
			
			

		}
	}
	public function validar_contrasena1($pw){
		if($this->validar_variable($pw)==false){
			return "Falta poner la primera contraseña";
		}else{
			$this->contrasena=$pw;
			return "";
		}
	}
	public function validar_contrasena2($pw1,$pw2){
		if($this->validar_variable($pw1)==false){
			return "Falta poner la primera contraseña";
		}
		if($this->validar_variable($pw2)==false){
			return "Falta poner la segunda contraseña";
		}
		if($this->contrasenasCorrectas($pw1,$pw2)==false){
			return "La contraseñas debe coincidir";
		}else{
			$this->contrasena=$pw1;
			return "";
		}
	}
	public function validar_adicional($adi){
		if($this->validar_variable($adi)==false){
			return "Debe ingresar su nombre y apellido";
		}else{
			$this->adicional=$adi;
			return "";
		}
	}
	public function validar_correo($email){
		if($this->validar_variable($email)==false){
			return "Falta ingresar correo electronico";
		}else{
			$this->correo=$email;
			return "";
		}
	}
	public function contrasenasCorrectas($pw,$reppw){

			if($pw===$reppw){
				return true;
			}else{
				return false;
			}
	}

	public function mostrar_nombre_usuario(){
		if($this->nombre_usuario!==""){
			echo 'value="'.$this->nombre_usuario.'"';

		}
	}
	public function mostrar_adicional(){
		if($this->adicional!==""){
			echo 'value="'.$this->adicional.'"';
		}
	}
	public function mostrar_correo(){
		if($this->correo!==""){
			echo 'value="'.$this->nombre.'"';
		}

	}
	public function formatoHTML($variable){
		return "<div class='alert alert-danger formato'>$variable</p>";
	}
	public function mostrar_errornombre_usuario(){
		if($this->error_nombre_usuario!==""){
			return $this->formatoHTML($this->error_nombre_usuario);
		}
	}
	public function mostrar_errorcontrasena1(){
		if($this->error_contrasena!==""){
			return  $this->formatoHTML($this->error_contrasena);

		}
	}
	public function mostrar_errorcontrasena2(){
		if($this->error_repcontrasena!==""){
			return  $this->formatoHTML($this->error_repcontrasena);
		}
	}
	public function mostrar_erroradicional(){
		if($this->error_adicional!==""){
				return  $this->formatoHTML($this->error_adicional);
			}
	}
	public function mostrar_errorcorreo(){
		if($this->error_correo!==""){
			return $this->formatoHTML($this->error_correo);
		}
	}
	
	public function obtenernombre_usuario(){
		return $this->nombre_usuario;
	}
	public function obtener_contrasena(){
		return $this->contrasena;
	}
	public function obtener_adicional(){
		return $this->adicional;
	}
	public function obtener_correo(){
		return $this->correo;
	}
	public function todoescorrecto(){
		if($this->error_nombre_usuario=="" && $this->error_contrasena=="" && $this->error_repcontrasena=="" && $this->error_adicional=="" && $this->error_correo==""){
			return true;
		}else{
			return false;
		}
	}

	}



 ?>