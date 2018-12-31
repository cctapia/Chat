<?php 
include_once 'plantillas/doc-apertura.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/validadorLogin.inc.php';
session_start();//reanudamos la session reciente
if(isset($_SESSION['miusuario'])){
	header("Location: index.php");
}

Conexion::abrir_conexion();
if(isset($_POST['btniniciar'])){
$clase="panel panel-primary";

	}else{
	$clase="panel panel-success";
	}

?>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<div class="<?php echo $clase; ?>">
		<form action="<?php echo  $SERVER['PHP_SELF']; ?>" method="post">
			<div class="panel-body">
				<div class="row">
				
					<div class="col-md-6">
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block" name="btniniciar"> Iniciar Sesion</button>
				
					</div>
					</div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-success btn-block" name="btnregistrar"> Registrarse</button>
					</div>
				</div>
			</div>
			</form>
		</div>
		</div>
	</div>
	<div class="row">
		
		<?php 
		if(isset($_POST['btniniciar']) || isset($_POST['btnentrar'])){
		include_once 'plantillas/login.inc.php';
		}else if(isset($_POST['btnregistrar'])){
			include_once 'plantillas/registro.inc.php';
		}
		

		 ?>
	</div>
</div>
<?php 
include_once 'plantillas/doc-cierre.inc.php';
 ?>