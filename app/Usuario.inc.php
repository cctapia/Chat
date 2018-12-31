<?php 

class Usuario{//definimos un molde (clase)

  //atributos
  private $id;
  private $nombre_usuario;
  private $contrasena;
  private $correo;
  private $adicional;
  private $activo;
  private $fecha_registro;
  //metodos
  public function __construct($id,$nombre_usuario,$contrasena,$correo,$adicional,$activo,$fecha_registro){
      $this->nombre_usuario=$nombre_usuario;
      $this->contrasena=$contrasena;
      $this->correo=$correo;
      
      $this->adicional=$adicional;

  }
  public function setnombre_usuario($nombre){
    $this->nombre_usuario=$nombre;
  }

  public function setcontrasena($contrasena){
    $this->contrasena=$contrasena;
  }
  public function setcorreo($correo){
    $this->correo=$correo;
  }
  public function setadicional($adicional){
    $this->adicional=$adicional;
  }

  public function getnombre_usuario(){
    return $this->nombre_usuario;
  }

  public function getcorreo(){
    return $this->correo;
  }
  public function getadicional(){
    return $this->adicional;
  }
  public function getcontrasena(){
    return $this->contrasena;
  }

  public function getfecha_registro(){
    return $this->fecha_registro;
  }

  public function getactivo(){
    return $this->activo;
  }


}


 ?>