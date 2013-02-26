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
				$sql = $mySQL->runQuery("UPDATE fer_categorias_galeria SET  status='lixo' WHERE idcategoria='".$values."'");
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE fer_categorias_galeria SET  status='lixo' WHERE idcategoria='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=categorias_galeria&page=".$_GET['page']."");									
	break;
	
	case 'inativo':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE fer_categorias_galeria SET  status='inativo' WHERE idcategoria='".$values."'");	
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE fer_categorias_galeria SET  status='inativo' WHERE idcategoria='".$_GET['id']."'");	
		}
			header("Location:../principal.php?type=categorias_galeria&page=".$_GET['page']."");							
	break;
	
	case 'publicado':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE fer_categorias_galeria SET  status='publicado' WHERE idcategoria='".$values."'");
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE fer_categorias_galeria SET  status='publicado' WHERE idcategoria='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=categorias_galeria&page=".$_GET['page']."");							
	break;
	case 'restaurar':
		$sql = $mySQL->runQuery("UPDATE categorias_galeria SET  status='inativo' WHERE idcategoria='".$_GET['id']."'");
			header("Location:../principal.php?type=categorias_galeria&page=".$_GET['page']."");						
	break;
	case 'deletar':
		$sql = $mySQL->runQuery("DELETE FROM fer_categorias_galeria WHERE idcategoria ='".$_GET['id']."'");
			header("Location:../principal.php?type=categorias_galeria&page=".$_GET['page']."");							
	break;
	
	case 'pub_todos':
		print_r($_POST['id']);
	break;
}

if($_POST['opt']=='editar') {

	$sql = $mySQL->runQuery("UPDATE fer_categorias_galeria SET  
			nome='".$_POST['nome']."',
			lingua='".$_POST['lingua']."',
			status='".$_POST['status']."'
			WHERE idcategoria='".$_POST['idcategoria']."'");
			
				//redireciona para a pagina de sucesso
				header("Location:../principal.php?type=categorias_galeria&id=".$_POST['idcategoria']."");
				exit;	
} elseif($_POST['opt']=='deletar') {
	$sql = $mySQL->runQuery("UPDATE fer_categorias_galeria SET  status='lixo' WHERE idcategoria='".$_POST['idcategoria']."'");
		//redireciona para a pagina de sucesso
				header("Location:../principal.php?type=categorias_galeria&msg=lixo");
				exit;		
} elseif($_POST['opt']=='inserir' || $_POST['opt']=='editar') {
	
	
//DESABILITA O BOTAO DE SUBMIT
unset($_POST['inserir']);
unset($_POST['opt']);

$campoImagem = 'imagem';	
$diretorioIMG = '../../_imgs/_ups';

	foreach($_POST as $k=>$value){
		
		if( $k != "x" && $k != "y"){
			$campos.= "$k,";
				$valores.="'$value',";
		}
		
	}

	$campos = "(".substr($campos,0,strlen($campos)-1).")";
	$valores = "(".substr($valores,0,strlen($valores)-1).")";
	$sql = $mySQL->runQuery("INSERT INTO fer_categorias_galeria ".$campos ." VALUES " . $valores);	
		header("Location:../principal.php?type=categorias_galeria");	
			exit;	
}
?>