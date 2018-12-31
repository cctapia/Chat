<?php 
session_start();//reanudamos la session creada

if(!isset($_SESSION['miusuario'])){
	header("Location: sala.php");
}

?>