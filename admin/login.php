<?php
include("../_includes/conexao.php");
include("_includes/funcoes.php");

$usuario = $Funcoes->escape($_POST["usuario"]);
$senha = $Funcoes->escape($_POST["senha"]);

$sql = $mySQL->runQuery("SELECT * FROM fer_admin WHERE usuario='".$usuario."' AND senha='".$senha."' AND ativo='1'");
$rsadmin = mysql_fetch_array($sql);

if ($rsadmin > 0 ) {
	session_start();

	$_SESSION["idadmin"] = $rsadmin["idadmin"];
	$_SESSION["usuario"] = $rsadmin["usuario"];
	$_SESSION["nomeuser"] = $rsadmin["nomeuser"];
	
	//gera um log de acesso 
 	$Funcoes->Logger($_SESSION["nomeuser"]." - Entrou na administra��o");
	
	header("Location:principal.php");
	
} else {	
		
	//gera um log de acesso 
	$Funcoes->Logger("Usu�rio ".$usuario." e Senha ".$senha." n�o foram encontrados");
	header("Location:index.php?msg=1");
	
}
?>