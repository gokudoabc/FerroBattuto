<?php
include("../../_includes/conexao.php");
include("../_includes/funcoes.php");

$ids_explode = explode(",",$_GET['id']);
//Acao da pagina principal da area 
switch ($_GET['status']) {		

	case 'lixo':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE forteap_listaclientes SET  status='lixo' WHERE idlista='".$values."'");				
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE forteap_listaclientes SET  status='lixo' WHERE idlista='".$_GET['id']."'");	
		}
			header("Location:../principal.php?type=lista");					
	break;
	
	case 'inativo':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE forteap_listaclientes SET  status='inativo' WHERE idlista='".$values."'");				
				}
			}			
		} else {
		$sql = $mySQL->runQuery("UPDATE forteap_listaclientes SET  status='inativo' WHERE idlista='".$_GET['id']."'");	
		}
			header("Location:../principal.php?type=lista");		
	break;
	
	case 'publicado':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE forteap_listaclientes SET  status='publicado' WHERE idlista='".$values."'");			
				}
			}			
		} else {
		$sql = $mySQL->runQuery("UPDATE forteap_listaclientes SET  status='publicado' WHERE idlista='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=lista");		
	break;
	case 'restaurar':
		$sql = $mySQL->runQuery("UPDATE forteap_listaclientes SET  status='inativo' WHERE idlista='".$_GET['id']."'");
			header("Location:../principal.php?type=lista");		
	break;
	case 'deletar':
		$sql = $mySQL->runQuery("DELETE FROM forteap_listaclientes WHERE idlista ='".$_GET['id']."'");
			header("Location:../principal.php?type=lista");		
	break;
	
	case 'pub_todos':
		print_r($_POST['id']);
	break;
}

if($_POST['opt']=='editar') {
	
	$sql = $mySQL->runQuery("UPDATE forteap_listaclientes SET  nome='".$_POST['nome']."',link ='".$_POST['link']."',ordem='".$_POST['ordem']."',datamodificado=NOW(),autor2='".$_SESSION["usuario"]."',status='".$_POST['status']."' WHERE idlista='".$_POST['idlista']."'");
				//redireciona para a pagina de sucesso
				header("Location:../principal.php?type=edlista&id=".$_POST['idlista']."");
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
$campoImagem = 'imagem';
$diretorioIMG = 'teste';

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
	$sql = $mySQL->runQuery("INSERT INTO forteap_listaclientes ".$campos ." VALUES " . $valores);	
		header("Location:../principal.php?type=lista");	
			exit;	
}
?>