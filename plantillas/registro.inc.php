<?php
function comprobarExistencia(){
	if(isset($_POST['txtnombre_usuario']) && isset($_POST['txtcontrasena1']) && isset($_POST['txtcontrasena2']) && isset($_POST['txtadicional']) &&  isset($_POST['txtcorreo']) && isset($_POST['btnregistrar'])){
		
		return true;
	}else{
	
		return false;
	}
}
include_once 'app/ValidadorRegistro.inc.php'; 
if(comprobarExistencia()){

	$validador=new ValidadorRegistro($_POST['txtnombre_usuario'],$_POST['txtcontrasena1'],$_POST['txtcontrasena2'],$_POST['txtadicional'],$_POST['txtcorreo']);
	if($validador->todoescorrecto()){
		$usuario=new Usuario("",$validador->obtenernombre_usuario(),$validador->obtener_contrasena(),$validador->obtener_correo(),$validador->obtener_adicional(),"1","");

		

			
	
	}
}


 ?>
<div class="col-md-4 col-md-offset-4">
	<form action="<?php echo $SERVER['PHP_SELF']; ?>" method="post">
		<div class="panel panel-success">
		<div class="panel-heading">
			<h5><label>Completa tus datos</label></h5>
		</div>
			<div class="panel-body">
				<?php 

				if(comprobarExistencia()){
					if($validador->todoescorrecto()){
						$repositorio= new RepositorioUsuario(Conexion::obtener_conexion());
					$insertado=$repositorio->registrar_usuario($usuario);
					}
					}

				 ?>
				<div class="form-group">
					<label>Usuario</label>
					<input type="text" name="txtnombre_usuario" class="form-control input-sm" placeholder="@ejemplo123" value="<?php 
					if(comprobarExistencia()){
					 echo $validador->obtenernombre_usuario();

					}
					 ?>">
					
					<?php 
				if(comprobarExistencia()){
			 	echo $validador->mostrar_errornombre_usuario();
					}
				?>
						
				</div>
				<div class="form-group">
					<label>Contraseña</label>
					<input type="password" name="txtcontrasena1" class="form-control input-sm" placeholder="Contraseña">
					<?php 
					if(comprobarExistencia()){
						 echo $validador->mostrar_errorcontrasena1();
					}
					 
					?>
					
				</div>
				<div class="form-group">
					<label>Repetir contraseña</label>
					<input type="password" name="txtcontrasena2" class="form-control input-sm" placeholder="Contraseña">
					<?php 
						if(comprobarExistencia()){
							 echo $validador->mostrar_errorcontrasena2();
						}
					 ?>
				</div>
				<div class="form-group">
					<label>Nombres y apellidos</label>
					<input type="text" name="txtadicional" class="form-control input-sm" placeholder="Nombre completo" value="<?php if(comprobarExistencia()){
						echo $validador->obtener_adicional();
						} ?>">
					<?php 
					if(comprobarExistencia()){
						 echo $validador->mostrar_erroradicional();
					}
					 ?>
					
				</div>
				<div class="form-group">
					<label>Correo electronico</label>
					<input type="text"  name="txtcorreo" class="form-control input-sm" placeholder="Correo electronico" value="<?php if(comprobarExistencia()){
						 echo $validador->obtener_correo();
						} ?>">
					<?php 
					if(comprobarExistencia()){
						 echo $validador->mostrar_errorcorreo();
					}
					 ?>
					
				</div>
				<?php 

				if($insertado){

				echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span> <label> Usuario registrado correctamente</label></div>";
				}

				 ?>
				<div class="form-group">
					<button type="submit" name="btnregistrar" class="btn btn-success">Registrar</button>
					<button type="reset" class="btn btn-warning">Limpiar</button>
				</div>
			</div>
		</div>
	</form>
</div>