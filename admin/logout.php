<?php 
session_start();

unset($_SESSION["idadmin"]);
unset($_SESSION["usuario"]);
unset($_SESSION["nomeuser"]);

header("Location:index.php");

?>

