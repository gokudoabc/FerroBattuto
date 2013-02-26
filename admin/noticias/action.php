<?php
include("../../_includes/conexao.php");
include("../_includes/funcoes.php");
include('../_includes/class.upload.php');
if($_POST['BSQ']){
	$cataaa = $_POST['BSQ'];
				header("Location:../principal.php?type=noticias&BSQ=".$_POST['BSQ']."");
	
	} 
//diretorio do upload
$dir_dest = '../../_imgs/_ups';	
//inicio do upload	
$handle = new Upload($_FILES['imagem']);   
    if ($handle->uploaded) {		
		$temp = substr(md5(uniqid(time())), 0, 10);
       	$handle->file_new_name_body   = $temp;
	    $handle->image_resize            = true;
        $handle->image_ratio_y          = true;
        $handle->image_x                 = 1000;
       
        $handle->Process($dir_dest);        
        if ($handle->processed) {
           $imagem =  $handle->file_dst_name;
        } else {           
    }
		} else {
		if($_POST['imagem_delete']==1) {
				$imagem = '';
			} else {
				$imagem = $_POST['img_old'];
			}
		}


$ids_explode = explode(",",$_GET['id']);
//Acao da pagina principal da area 
switch ($_GET['status']) {		

	case 'lixo':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE fer_artigo SET  status='lixo' WHERE idartigo='".$values."'");
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE fer_artigo SET  status='lixo' WHERE idartigo='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=noticias&page=".$_GET['page']."");									
	break;
	
	case 'inativo':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE fer_artigo SET  status='inativo' WHERE idartigo='".$values."'");	
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE fer_artigo SET  status='inativo' WHERE idartigo='".$_GET['id']."'");	
		}
			header("Location:../principal.php?type=noticias&page=".$_GET['page']."");							
	break;
	
	case 'publicado':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE fer_artigo SET  status='publicado' WHERE idartigo='".$values."'");
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE fer_artigo SET  status='publicado' WHERE idartigo='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=noticias&page=".$_GET['page']."");						
	break;
	case 'restaurar':
		$sql = $mySQL->runQuery("UPDATE fer_artigo SET  status='inativo' WHERE idartigo='".$_GET['id']."'");
			header("Location:../principal.php?type=noticias&page=".$_GET['page']."");							
	break;
	case 'deletar':
		$sql = $mySQL->runQuery("DELETE FROM fer_artigo WHERE idartigo ='".$_GET['id']."'");
			header("Location:../principal.php?type=noticias&page=".$_GET['page']."");						
	break;
	
	case 'pub_todos':
		print_r($_POST['id']);
	break;
}

if($_POST['opt']=='editar') {

	$sql = $mySQL->runQuery("UPDATE fer_artigo SET  
			titulo='".$_POST['titulo']."',
			resumo='".$_POST['resumo']."',
			imagem='".$imagem."',
			datamodificacao=NOW(),
			autor2='".$_POST['autor2']."',
			artigo='".$_POST['artigo']."',
			ordem='".$_POST['ordem']."',
			status='".$_POST['status']."' 
			WHERE idartigo='".$_POST['idartigo']."'");
			
				//redireciona para a pagina de sucesso
				header("Location:../principal.php?type=ednoticias&id=".$_POST['idartigo']."");
				exit;	
} elseif($_POST['opt']=='deletar') {
	$sql = $mySQL->runQuery("UPDATE fer_artigo SET  status='lixo' WHERE idartigo='".$_POST['idartigo']."'");
		//redireciona para a pagina de sucesso
				header("Location:../principal.php?type=noticias&msg=lixo");
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
	$sql = $mySQL->runQuery("INSERT INTO fer_artigo ".$campos ." VALUES " . $valores);	
		header("Location:../principal.php?type=noticias");	
			exit;	
}
?>