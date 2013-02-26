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
 	$Funcoes->Logger($_SESSION["nomeuser"]." - Entrou na administração");
	
	header("Location:principal.php");
	
} else {	
		
	//gera um log de acesso 
	$Funcoes->Logger("Usuário ".$usuario." e Senha ".$senha." não foram encontrados");
	header("Location:index.php?msg=1");
	
}
?>