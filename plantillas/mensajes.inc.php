
		<div class="col-md-4">
		<form action="<?php echo $SERVER['PHP_SELF']; ?>" method="post">
			<div class="panel panel-success">
			<div class="panel panel-heading">
				<h4 class="panel-title"><label id="nombreusuario">
				<?php 

				 if(empty($fotoamigo) && empty($fotoyo)){
					?>
					<img src="img/diamond.png" class="img-circle" width="60" height="60">
					<?php
				}else{
					?>
					<img  src="data:image/jpg;base64,<?php if (!isset($fotoamigo)){
					echo base64_encode($fotoyo);
					
				}else{
					echo base64_encode($fotoamigo);
				}?>" alt="La imagen no se encontro" class="img-circle" width="60"  height="60">
				<?php
				}

				?>
				 
				<?php if(isset($_POST['btnponerreceptor'])){
					echo $desp->obtener_receptor(); 
					}else{
						echo $desp->obtener_receptor();
						
					} ?></label></h4>

					<!--Aqui ira una pruab del usuarios consultado-->
					<?php 
					$amigo=$amigos->obtenerIdDelAmigo($desp->obtener_receptor());

					foreach ($amigo as $fila) {
						$id_receptor=$fila['id'];

					}
					 ?>
					 <input type="text" name="txtusuarioadicional" value="<?php echo $desp->obtener_receptor(); ?>" hidden="true">
					 <input type="text" name="txtdetallle" value="<?php echo $fila['id'] ?>" hidden="true">
			</div>
				<div class="panel-body">
				<?php 
							$resulset=Mensaje::mostrarMensaje(Conexion::obtener_conexion(),$id,$id_receptor);

							 foreach($resulset as $fila) {
							 	if($fila['id_usuario_emisor']==$id){
							 		echo "Sin entro en el if";
							 					echo "<div class='row'>
					<div class='col-md-6 bloqueyo2'>
						<div class='panel panel-successs bloqueyo'>
							<div class='panel-body'>
								
								<p class='text-left' style='margin-bottom: 18px;'>$fila[mensaje]</p>
								<small><p style='color:red;' class='text-left'>$fila[fecha_mensaje]</p></small>
							</div>
						</div>
					</div>
				</div>";

					}else{
							 						echo "<div class='row'>
					<div class='col-md-6 bloqueamigo2 col-md-offset-6'>
						<div class='panel panel-successs bloqueamigo'>
							<div class='panel-body'>
								<p class='text-left' style='margin-bottom: 18px;'>$fila[mensaje]</p>
								<p style='color:red;' class='text-left'>$fila[fecha_mensaje]</p>
							</div>
						</div>
					</div>
				</div>";
							 	}
         			
					}

        			?>
						
					<div class="row">
					<div class="form-group">
						<div class="col-md-8">
					<textarea class="form-control" name="txtmensaje"></textarea>
					<?php if(isset($_POST['btnenviarmensaje'])){
						//$validador->mostrar_error_mensaje();
					}

					 ?>
						</div>
						<div class="col-md-4">
							<button type="submit" name="btnenviarmensaje" class="btn btn-primary btn-block btn-lg">Enviar</button>
						</div>
					</div>
						</div>
					</div>
			</div>
			</form>
		</div>
