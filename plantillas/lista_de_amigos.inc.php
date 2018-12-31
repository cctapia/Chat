
<div class="col-md-2">
	<div class="panel panel-primary">
		<div class="panel panel-heading">
			<h4 class="panel-title"><label>Lista de amigos</label></h4>
		</div>
		
		<div class="panel-body">
		<div class="row">
		<?php 
			foreach ($registro as $fila) {
		?>
			<form action="<?php echo $SERVER['PHP_SELF']; ?>" method="post">
			<div class='col-md-12'>
			
			<button type="submit" class="btn btn-default btn-block" name="btnponerreceptor" value="<?php echo $fila['nombre_usuario'];?>">
			<?php 
				if(empty($fila['foto'])){

					?>
					<img src="img/diamond.png" class="img-circle img-menosmargin" width="30" height="30" alt="La imagen no se econtro">
					<?php
				}else{

					?>
					<img  src="data:image/jpg;base64,<?php echo base64_encode($fila['foto']);?>" alt="La imagen no se encontro" width="30" height="30" class="img-circle img-menosmargin">
					<?php
				}
			 ?>
			<?php echo $fila['nombre_usuario'];?></button>
			</div>
			</form>
			<?php
			}
		 	?>
		</div>
		</div>	
	</div>
</div>
