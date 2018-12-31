<?php 
if(isset($_POST['btnentrar'])){
	$validar=new ValidadorLogin(htmlentities(addslashes($_POST['user'])),htmlentities(addslashes($_POST['password'])));
		if($validar->todoescorrecto()){
			$login=new RepositorioUsuario(Conexion::obtener_conexion());
			$existe=$login->login($validar->obtener_user(),$validar->obtener_password());

			if($existe){
				session_start();//iniciamos una nueva sesion
				$_SESSION['miusuario']=$_POST['user'];

				header("Location: index.php");

			}else{
				$msg="Usuario o contraseña incorrecta";
			}
		}
}

 ?>

<br>
<div class="col-md-4 col-md-offset-4">
	<form class="form-horizontal" action="<?php echo $SERVER['PHP_SELF']; ?>" method="post">
		<div class="panel panel-primary">
	<!-- 	<div class="panel-heading">
			<h4><label>Joyero Chat</label></h4>
		</div> -->
		<div class="panel-body">
		<div class="form-group">
			<label class="col-md-3 control-label">Usuario:</label>
			<div class="col-md-9">
				<input type="text" name="user" class="form-control" placeholder="@user" autofocus>
				<?php if(isset($_POST['btnentrar'])){
						$validar->mostrar_error_user();
					} 
					?>
			</div>

		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Contraseña:</label>
			<div class="col-md-6">
				<input type="password" name="password" class="form-control" placeholder="Contraseña">
				<?php 
					if(isset($_POST['btnentrar'])){
						$validar->mostrar_error_password();
					}
				 ?>
			</div>
			<div class="col-md-3">
				<button type="submit" name="btnentrar" class="btn btn-primary btn-block">Entrar</button>
				<br>
			</div>

				<?php 
					if(!empty($msg)){
					
					?>
				<div class="col-md-12 alert alert-danger">
				<?php echo $msg; ?>
				</div>
				<?php
					}
				 ?>
			
		</div>

		<div class="form-group">
		<div class="col-md-12">
			<p>¿Olvidaste tu contraseña? <a href="">Clic aqui</a></p>
		</div>
		</div>
		
		</div>
		</div>

	</form>
</div>