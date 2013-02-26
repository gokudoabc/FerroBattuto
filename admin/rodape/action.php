<?php
ob_start();
include("../../_includes/conexao.php");
include("../_includes/funcoes.php");

if($_POST['opt']=='editar') {

	$sql = $mySQL->runQuery("UPDATE fer_artigo SET  
			titulo='".$_POST['titulo']."',
			artigo='".$_POST['artigo']."'
			WHERE idartigo='".$_POST['idVai']."'");
				header("Location:../principal.php?type=rodape");
				exit;	
}
?>