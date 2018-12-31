<?php include_once 'app/RepositorioUsuario.inc.php';
	include_once 'app/ValidadorFoto.inc.php';
	include_once 'app/Conexion.inc.php';

	Conexion::abrir_conexion();
	$rep=new RepositorioUsuario(Conexion::obtener_conexion());

	if(isset($_POST['btn-cambiarfotoperfil'])){
		$validar=new ValidadorImagen(addslashes(file_get_contents($_FILES['inputnuevafoto']['tmp_name'])));

		if($validar->todoescorrecto()){//si esto es true
			
			$camb=new RepositorioUsuario(Conexion::obtener_conexion());
			$camb->cambiarFotoPerfil($validar->obtener_fotoperfil(),$_SESSION['miusuario']);

			}

	}

 ?>
 <form action="<?php echo $SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<nav class="navbar navbar-inverse navbar-static-top">
<div class="container"><!--creando la cabecera-->

	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	<span class="sr-only">
		Este boton permite cambiar de menu
	 </span>
	 <span class="icon-bar"></span>
	 <span class="icon-bar"></span>
	 <span class="icon-bar"></span>

	</button>
	<?php 

	$resultado=$rep->obtenerFoto($_SESSION['miusuario']);

	foreach ($resultado as $fila) {
		$fotouser=$fila['foto'];
	}
	 ?>

		<a class="navbar-brand" href="index.php" ><img src="img/diamond.png" width="50" height="40"> <!--permite colocar tu logo o un texto-->
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
					
				<li><a href="mensajes.php"><span class="glyphicon glyphicon-comment"></span></a></li>
				<li><a href="#"><span class="glyphicon glyphicon-globe"></span></a></li>
				<li><a href="#"><span class="glyphicon glyphicon-user"></span><sup>+</sup></a></li>
</ul>

<ul class="nav navbar-nav navbar-right ">
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    	<?php 
    	if(empty($fotouser)){
    	 	?>
    	 	<img src="img/diamond.png" alt="La imagen no se encontro" id="imagenperfil" class="img-circle">
    	 	<?php

    		}else{
    			?>
    			<img  src="data:image/jpg;base64,<?php echo base64_encode($fotouser);?>" alt="La imagen no se encontro" id="imagenperfil" class="img-circle">
    			<?php
    		}
			?>
      </a>
      <ul class="dropdown-menu">
      	<li>Cambiar Foto<input type="file" name="inputnuevafoto"></li>
      	<li><button type="submit" name="btn-cambiarfotoperfil" class="btn btn-success btn-block"> Cambiar</button></li>
      </ul>
	</li>
	<li id="especial" class="maspequenio"> <a href="perfil.php"><?php $usuario=$_SESSION['miusuario']; echo $usuario;?></a>
	</li>
	<li class="maspequenio"><a href="#"><span class="glyphicon glyphicon-picture"></span> Fotos
	</a></li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle maspequenio" data-toggle="dropdown">Opciones <span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="app/salir.php">Salir</a></li>
		</ul>
	</li>

</ul>
</div>

</div>
</nav>
</form>