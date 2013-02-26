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
				$sql = $mySQL->runQuery("UPDATE clt_categorias SET  status='lixo' WHERE idcategoria='".$values."'");
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE clt_categorias SET  status='lixo' WHERE idcategoria='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=categorias");					
	break;
	
	case 'inativo':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE clt_categorias SET  status='inativo' WHERE idcategoria='".$values."'");	
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE clt_categorias SET  status='inativo' WHERE idcategoria='".$_GET['id']."'");	
		}
			header("Location:../principal.php?type=categorias");		
	break;
	
	case 'publicado':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE clt_categorias SET  status='publicado' WHERE idcategoria='".$values."'");
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE clt_categorias SET  status='publicado' WHERE idcategoria='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=categorias");		
	break;
	case 'restaurar':
		$sql = $mySQL->runQuery("UPDATE clt_categorias SET  status='inativo' WHERE idcategoria='".$_GET['id']."'");
			header("Location:../principal.php?type=categorias");		
	break;
	case 'deletar':
		$sql = $mySQL->runQuery("DELETE FROM clt_categorias WHERE idcategoria ='".$_GET['id']."'");
			header("Location:../principal.php?type=categorias");		
	break;
	
	case 'pub_todos':
		print_r($_POST['id']);
	break;
}

if($_POST['opt']=='editar') {

	$sql = $mySQL->runQuery("UPDATE clt_categorias SET  
			nome='".$_POST['nome']."',
			lingua='".$_POST['lingua']."',
			status='".$_POST['status']."'
			WHERE idcategoria='".$_POST['idcategoria']."'");
			
				//redireciona para a pagina de sucesso
				header("Location:../principal.php?type=edcategorias&id=".$_POST['idcategoria']."");
				exit;	
} elseif($_POST['opt']=='deletar') {
	$sql = $mySQL->runQuery("UPDATE clt_categorias SET  status='lixo' WHERE idcategoria='".$_POST['idcategoria']."'");
		//redireciona para a pagina de sucesso
				header("Location:../principal.php?type=categorias&msg=lixo");
				exit;		
} elseif($_POST['opt']=='inserir' || $_POST['opt']=='editar') {
	
	
//DESABILITA O BOTAO DE SUBMIT
unset($_POST['inserir']);
unset($_POST['opt']);

$campoImagem = 'imagem';	
$diretorioIMG = '../../_imgs/_ups';

	$campos = "autor,datamodificacao,imagem,";
	$valores= "'".$_SESSION['nomeuser']."',NOW(),'".$imagem."',";
	foreach($_POST as $k=>$value){
		
		if( $k != "x" && $k != "y"){
			$campos.= "$k,";
				$valores.="'$value',";
		}
		
	}
	$campos = "(".substr($campos,0,strlen($campos)-1).")";
	$valores = "(".substr($valores,0,strlen($valores)-1).")";
	$sql = $mySQL->runQuery("INSERT INTO clt_categorias ".$campos ." VALUES " . $valores);	
		header("Location:../principal.php?type=categorias");	
			exit;	
}
?>