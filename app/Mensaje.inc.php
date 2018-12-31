<?php 
//a este objeto vendran los datos validados

class Mensaje{
	//atributos
	private $id_usuario_emisor;
	private $mensaje;
	private $fecha_mensaje;
	private $id_usuario_receptor;
	

	private $conexioncito;

	//metodos

	public function __construct($cnn,$id_usuario_emisor,$mensaje,$id_usuario_receptor){


		$this->conexioncito=$this->validarConexion($cnn);
		$this->id_usuario_emisor=$id_usuario_emisor;
		$this->mensaje=$mensaje;
		$this->id_usuario_receptor=$id_usuario_receptor;


	}

	public function validarConexion($cn){
		if(isset($cn) && !empty($cn)){
			return $cn;
		}else{
			return "No existe la conexion";
		}
	}
	public function registrarmensaje(){
		$insertado=false;//comienza en NO SE HA INSERTADO
		try {
			$sql= "INSERT INTO mensajes(id_usuario_emisor,mensaje,id_usuario_receptor)VALUES(:id_usuario_emisor,:mensaje,:id_usuario_receptor)";

        $sentencia=$this->conexioncito->prepare($sql);
        $sentencia->bindParam(':id_usuario_emisor',$this->id_usuario_emisor, PDO::PARAM_STR);
        $sentencia->bindParam(':mensaje',$this->mensaje, PDO::PARAM_STR);
     
        $sentencia->bindParam(':id_usuario_receptor',$this->id_usuario_receptor, PDO::PARAM_STR);
        $insertado=$sentencia->execute();

		} catch (PDOException $e) {
			print "Error: ".$e->getMessage();
		}
		return $insertado;

	}
	public  static function mostrarMensaje($cnnn,$id_usuario_emisor,$id_usuario_receptor){//Un  metodo para sql
		try {
			$sql="SELECT * FROM mensajes WHERE (id_usuario_receptor=:id_usu_rec and id_usuario_emisor=:id_usu_emi) or (id_usuario_emisor=:id_usu_rec and id_usuario_receptor=:id_usu_emi)";
			$sentencia=$cnnn->prepare($sql);

			$sentencia->bindParam(':id_usu_rec',$id_usuario_receptor, PDO::PARAM_STR);
        	
        	$sentencia->bindParam(':id_usu_emi',$id_usuario_emisor, PDO::PARAM_STR);
        	

        	 $sentencia->execute();

        	$resultado=$sentencia->fetchAll();

		} catch (PDOException $e) {
			print "Error: ".$e->getMessage();
		}

		return $resultado;
	}
	public function mostrarReceptor($username){
		if(isset($username) && !empty($username)){
			return $receptor;
		}
	}


}



 ?>