<?php 

session_start();//reanudamos la session existente;
session_destroy();
header("Location: ../sala.php");

 ?>
 