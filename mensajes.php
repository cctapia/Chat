<?php 
$titulo="Mensajes";
include_once 'app/comprobar.php';
include_once 'plantillas/doc-apertura.inc.php';
include_once 'plantillas/navbar.inc.php';
include_once 'app/ValidadorMensaje.inc.php';
include_once 'app/Mensaje.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Desplazamiento.inc.php';
Conexion::abrir_conexion();
$id;
$id_del_receptor;
$foto;
$ad=$_SESSION['miusuario'];

if(isset($_POST['btnenviarmensaje'])){
	$ad=$_POST['txtusuarioadicional'];
}
	if(isset($_POST['btnponerreceptor'])){
				$desp=new Desplazamiento($_POST['btnponerreceptor']);
			}else{
				$desp=new Desplazamiento($ad);
			}
			
$amigos=new RepositorioUsuario(Conexion::obtener_conexion());
$resulset=$amigos->obtenerIdActual($_SESSION['miusuario']);//este metodo es para traer el mi ID y MI FOTO
foreach ($resulset as $fila) {
		$id=$fila['id'];
		$fotoyo=$fila['foto'];
}

$registro=$amigos->mostrar_amigos($id);
$amigito=$amigos->obtenerIdDelAmigo($_POST['btnponerreceptor'],$_POST['txtdetallle']);//este metodo tambien me devuelve la foto del amigo
foreach ($amigito as $fila){
	$id_del_receptor=$fila['id'];
	$fotoamigo=$fila['foto'];
}

//echo "El usuario: ".$_SESSION['miusuario']." tiene el id: ".$id."<br>";
if(isset($_POST['btnenviarmensaje'])){
	$validador=new ValidadorMensaje($id,$_POST['txtmensaje'],$_POST['txtdetallle']);

	if($validador->todoescorrecto()){
		
			$mensaje=new Mensaje(Conexion::obtener_conexion(),$validador->getid_usuario_emisor(),$validador->getmensaje(),$validador->getid_usuario_receptor());
		$correcto=$mensaje->registrarmensaje();
	}
}

 ?>
	<div class="container">
 	<div class="row">
 		<?php 
 		include_once 'plantillas/mensajes.inc.php'; 
 		include_once 'plantillas/lista_de_amigos.inc.php';
 		?>
 	</div>
 	</div>
 
<?php 
include_once 'plantillas/doc-cierre.inc.php';
  ?>