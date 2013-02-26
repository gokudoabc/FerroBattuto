<?php
include("../../_includes/conexao.php");
include("../_includes/funcoes.php");

$ids_explode = explode(",",$_GET['id']);
//Acao da pagina principal da area 
switch ($_GET['status']) {		

	case 'lixo':
	
	//verificacao para saber se tem algum registro na categoria, caso tenha algo não deixa inativar
	$sql = $mySQL->runQuery("SELECT * FROM forteap_orienta WHERE titulo_menu='".$_GET['id']."'");
		$rs_verifica = mysql_num_rows($sql);
		
		if($rs_verifica >0) {
			header("Location:../principal.php?type=categoria&msg=1");		
			exit;
		} else {
			
	
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE forteap_categoria SET  status='lixo' WHERE idcategoria='".$values."'");
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE forteap_categoria SET  status='lixo' WHERE idcategoria='".$_GET['id']."'");
		}
	}
	
			header("Location:../principal.php?type=categoria");					
	break;
	
	case 'inativo':
	
	//verificacao para saber se tem algum registro na categoria, caso tenha algo não deixa inativar
	$sql = $mySQL->runQuery("SELECT * FROM forteap_orienta WHERE titulo_menu='".$_GET['id']."'");
		$rs_verifica = mysql_num_rows($sql);
		
		if($rs_verifica >0) {
			header("Location:../principal.php?type=categoria&msg=1");		
			exit;
		} else {
			
		
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE forteap_categoria SET  status='inativo' WHERE idcategoria='".$values."'");	
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE forteap_categoria SET  status='inativo' WHERE idcategoria='".$_GET['id']."'");	
		}
	}		
	header("Location:../principal.php?type=categoria");		
	break;
	
	case 'publicado':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE forteap_categoria SET  status='publicado' WHERE idcategoria='".$values."'");
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE forteap_categoria SET  status='publicado' WHERE idcategoria='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=categoria");		
	break;
	case 'restaurar':
		$sql = $mySQL->runQuery("UPDATE forteap_categoria SET  status='inativo' WHERE idcategoria='".$_GET['id']."'");
			header("Location:../principal.php?type=categoria");		
	break;
	case 'deletar':
		$sql = $mySQL->runQuery("DELETE FROM forteap_categoria WHERE idcategoria ='".$_GET['id']."'");
			header("Location:../principal.php?type=categoria");		
	break;
	
	case 'pub_todos':
		print_r($_POST['id']);
	break;
}

if($_POST['opt']=='editar') {
	

	$sql = $mySQL->runQuery("UPDATE forteap_categoria SET categoria='".$_POST['categoria']."',ordem='".$_POST['ordem']."',datamodificado=NOW(),autor2='".$_SESSION["usuario"]."',status='".$_POST['status']."' WHERE idcategoria='".$_POST['idcategoria']."'");
				//redireciona para a pagina de sucesso
				header("Location:../principal.php?type=edcategoria&id=".$_POST['idcategoria']."");
				exit;	
} elseif($_POST['opt']=='deletar') {
	$sql = $mySQL->runQuery("UPDATE teste SET  status='lixo'");
		//redireciona para a pagina de sucesso
				header("Location:index.php?msg=lixo");
				exit;		
} elseif($_POST['opt']=='inserir' || $_POST['opt']=='editar') {
	
	
//DESABILITA O BOTAO DE SUBMIT
unset($_POST['inserir']);
unset($_POST['opt']);

	$campos = "autor,datamodificado,";
	$valores= "'".$_SESSION["usuario"]."',NOW(),";
	foreach($_POST as $k=>$value){
		
		if( $k != "x" && $k != "y"){
			$campos.= "$k,";
				$valores.="'$value',";
		}
	}
		
	$campos = "(".substr($campos,0,strlen($campos)-1).")";
	$valores = "(".substr($valores,0,strlen($valores)-1).")";
	$sql = $mySQL->runQuery("INSERT INTO forteap_categoria ".$campos ." VALUES " . $valores);	
		header("Location:../principal.php?type=categoria");	
			exit;	
}
?>