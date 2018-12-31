<?php
class RepositorioUsuario{

  private $conexioncito;
  //atributo adiconal para mostra el usuaro receptor del mensaje
  private $username;
  
  public function __construct($cnn){
    $this->conexioncito=$cnn;
  }



  public function obtenerIdActual($username){
    if(isset($this->conexioncito)){
      try {
        $sql="SELECT id,foto FROM usuarios WHERE nombre_usuario=:user";
        $sentencia=$this->conexioncito->prepare($sql);
        $sentencia->bindParam(":user",$username,PDO::PARAM_STR);
        $sentencia->execute();//ejecutamos la sentencia sql

        $resultado=$sentencia->fetchAll();
      } catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
      }
    }
    return $resultado;//devovemos el id del usuario actual en la session
  }
  public function obtenerFoto($usersesion){
  if(isset($this->conexioncito)){
    try {
        $sql="SELECT foto FROM usuarios WHERE nombre_usuario=:username";
        $sentencia=$this->conexioncito->prepare($sql);
        $sentencia->bindParam(":username",$usersesion,PDO::PARAM_STR);
        $sentencia->execute();//ejectuamos la senetncia sql

        $resultado=$sentencia->fetchAll();

    } catch (PDOException $e) {
      print "Error: ".$e->getMessage();
    }
  }
  return $resultado;
  }
  public function cambiarFotoPerfil($nuevaFoto,$username){
    if(isset($this->conexioncito)){
      try {
          //planteamos nuestra senetncia sql

        $sql="UPDATE usuarios SET foto='$nuevaFoto' WHERE nombre_usuario=:username";
        $sentencia=$this->conexioncito->prepare($sql);
       $sentencia->bindParam(":username",$username,PDO::PARAM_STR);
        $sentencia->execute();//ejecutamos la sentencia sql

       


      } catch (PDOException $e) {
        print "Error: ".$e->getMessage();
      }
    }
    
  }
  public function existefoto($username){
    if(isset($this->conexioncito)){
      try {
        $resultado;
          $sql="SELECT foto FROM usuarios WHERE nombre_usuario=:user_name";
          $sentencia->$this->conexioncito->prepare($sql);
          $sentencia->bindParam(":user_name",$username);
          $sentencia->execute();
          $resultado=$sentencia->fetchAll();

         
      } catch (PDOException $e) {
        print "Error: ".$e->getMessage();
      }
    }

      return $resultado;
  }
  public function obtenerfotoamigopanel($username){
    if(isset($this->conexioncito)){
    try {
      $sql="SELECT foto FROM usuarios WHERE nombre_usuario=:username";
      $sentencia=$this->conexioncito->prepare($sql);
      $sentencia->bindParam(":username",$username,PDO::PARAM_STR);
      $sentencia->execute(); //ejecutamos la senetncia sql

      $resultado=$sentencia->fetchAll();

    } catch (PDOException $e) {
      print "Error: ".$e->getMessage();
      
    }
  }
    return $resultado;
  }
  public function obtenerIdDelAmigo($username,$id=""){
    if(isset($this->conexioncito)){
      try {
        
        $sql="SELECT id,foto FROM usuarios WHERE nombre_usuario=:user or id=:id";
        $sentencia=$this->conexioncito->prepare($sql);
        $sentencia->bindParam(":user",$username,PDO::PARAM_STR);
        $sentencia->bindParam(":id",$id,PDO::PARAM_STR);
        $sentencia->execute();//ejecutamos la sentencia sql
        $resultado=$sentencia->fetchAll();//rceorremos los datos para guardarlos en un array

      } catch (PDOException $e) {
        print "Error: ".$e->getMessage();
      }
    }
    return $resultado;
  }

  public  function login($user,$password){
    try {
      $existe=false;
        if(isset($this->conexioncito)){
          $sql="SELECT * FROM usuarios WHERE nombre_usuario=:username and contrasena=:contra";
          $sentencia=$this->conexioncito->prepare($sql);
          $sentencia->bindValue(":username",$user);//pasamos el primer parametro
          $sentencia->bindValue(":contra",$password);
          $sentencia->execute();//ejecutamos la sentencia sql
          $numeroregistro=$sentencia->rowCount();

          if($numeroregistro!=0){
            //Creariamos una session para el usuario
           $existe=true;

          }


        }
    } catch (PDOException $e) {
      print "Error: ".$e->getMessage();
    }
    return $existe;
  }

  public  function registrar_usuario($Objusuario){
    $usuario_insertado = false;
    if(isset($this->conexioncito)){
      try {
        $sql= "INSERT INTO usuarios(nombre_usuario,contrasena, correo, adicional)VALUES(:nombre_usuario,:contrasena,:correo,:adicional)";
        $sentencia=$this->conexioncito->prepare($sql);
        $sentencia->bindParam(':nombre_usuario',$Objusuario->getnombre_usuario(), PDO::PARAM_STR);
        $sentencia->bindParam(':contrasena',$Objusuario->getcontrasena(), PDO::PARAM_STR);
        $sentencia->bindParam(':correo',$Objusuario->getcorreo(), PDO::PARAM_STR);
        $sentencia->bindParam(':adicional',$Objusuario->getadicional(), PDO::PARAM_STR);
        
        $usuario_insertado =$sentencia->execute();
      } catch (PDOException $ex) {
      print "<div class='form-group alert alert-danger'><label>El usuario ya existe. Intentelo de nuevo</label><div>";

      }

    }
    return $usuario_insertado;
  }

  public function mostrar_amigos($id_usuario_actual){
    if(isset($this->conexioncito)){
      try {
        $sql="SELECT id,nombre_usuario,foto FROM usuarios WHERE id!=:id_actual";
        $sentencia=$this->conexioncito->prepare($sql);
        $sentencia->bindParam(":id_actual",$id_usuario_actual,PDO::PARAM_STR);

        $sentencia->execute();//ejecutamos la sentencia sql
        $resultado=$sentencia->fetchAll();


      } catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
      }
    }
    return $resultado;
  }
 

}



?>
