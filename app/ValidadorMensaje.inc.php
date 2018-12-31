<?php 
class ValidadorMensaje{
	//atributos
	private $id_usuario_emisor;
	private $mensaje;
	private $id_usuario_receptor;


	//atributos de error
	private $error_id_usuario_emisor;
	private $error_mensaje;
	private $error_id_usuario_receptor;

	//metodos

	public function __construct($id_user_emi,$mens,$id_user_rec){

		$this->error_id_usuario=$this->validar_id_usuario_emisor($id_user_emi);
		$this->error_mensaje=$this->validar_mensaje($mens);
		$this->error_id_usuario_receptor=$this->validar_id_usuario_receptor($id_user_rec);
		
	}
	public function todoescorrecto(){
		if($this->error_id_usuario_emisor=="" && $this->error_mensaje=="" && $this->error_id_usuario_receptor==""){
			return true;
		}else{
			return false;
		}
	}

	public function formatoHTML($variable){
		return "<div class='alert alert-danger formato'>$variable</div>";
	}
	public function validarVariable($variable){
		if(isset($variable) && !empty($variable)){
			return true;//todo es correcto
		}else{
			return false;//todo es incorrecto
		}
	}

	public function validar_id_usuario_emisor($id_usu_emi){
		if($this->validarVariable($id_usu_emi)==false){
			return "Debe pasar el id de un usuario";
		}else{
			if($id_usu_emi<=0){
				return  "El usuario no es valido";
			}else{
				$this->id_usuario_emisor=$id_usu_emi;
				return "";
			}
		}

	}

		public function validar_id_usuario_receptor($id_usu_rec){
		if($this->validarVariable($id_usu_rec)==false){
			return "Debe pasar el id de un usuario";
		}else{
			if($id_usu_rec<=0){
				return  "El usuario no es valido";
			}else{
				$this->id_usuario_receptor=$id_usu_rec;
				return "";
			}
		}

	}
	public function validar_mensaje($msj){
		if($this->validarVariable($msj)==false){
			return "Falta llenar el mensaje";
		}else{
			$this->mensaje=$msj;
			return "";
		}
	}
	public function mostrar_error_mensaje(){
		if($this->error_mensaje!==""){
			echo  $this->formatoHTML($this->error_mensaje);
		}

	}
	public function getid_usuario_emisor(){
		return $this->id_usuario_emisor;
	}
	public function getmensaje(){
		return $this->mensaje;
	}
	public function getid_usuario_receptor(){
		return $this->id_usuario_receptor;
	}
	





	}

 ?>