<?php
session_start();

$usuario = $_SESSION['idadmin'];
$senha = $_SESSION['usuario'];
	if (empty($usuario) || empty($senha)){
		header("Location:index.php");
	}
?>