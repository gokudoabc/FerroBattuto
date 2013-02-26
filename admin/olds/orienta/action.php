<?php
include("../../_includes/conexao.php");
include("../_includes/funcoes.php");
include('../_includes/class.upload.php');

//diretorio do upload
$dir_dest = '../../_img/_orienta';	
//inicio do upload	
$handle = new Upload($_FILES['imagem']);   
    if ($handle->uploaded) {		
		$temp = substr(md5(uniqid(time())), 0, 10);
       	$handle->file_new_name_body   = $temp;
	    $handle->image_resize            = true;
        $handle->image_ratio_y          = true;
        $handle->image_x                 = 290;
       
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
					$sql = $mySQL->runQuery("UPDATE forteap_orienta SET  status='lixo' WHERE idorienta='".$values."'");		
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE forteap_orienta SET  status='lixo' WHERE idorienta='".$_GET['id']."'");		
		}
			header("Location:../principal.php?type=orienta");					
	break;
	
	case 'inativo':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
					$sql = $mySQL->runQuery("UPDATE forteap_orienta SET  status='inativo' WHERE idorienta='".$values."'");	
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE forteap_orienta SET  status='inativo' WHERE idorienta='".$_GET['id']."'");	
		}
			header("Location:../principal.php?type=orienta");		
	break;
	
	case 'publicado':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
					$sql = $mySQL->runQuery("UPDATE forteap_orienta SET  status='publicado' WHERE idorienta='".$values."'");
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE forteap_orienta SET  status='publicado' WHERE idorienta='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=orienta");		
	break;
	case 'restaurar':
		$sql = $mySQL->runQuery("UPDATE forteap_orienta SET  status='inativo' WHERE idorienta='".$_GET['id']."'");
			header("Location:../principal.php?type=orienta");		
	break;
	case 'deletar':
		$sql = $mySQL->runQuery("DELETE FROM forteap_orienta WHERE idorienta ='".$_GET['id']."'");
			header("Location:../principal.php?type=orienta");		
	break;	
}

if($_POST['opt']=='editar') {

	$sql = $mySQL->runQuery("UPDATE forteap_orienta SET  titulo='".addslashes($_POST['titulo'])."',titulo_menu ='".addslashes($_POST['titulo_menu'])."',imagem='".$imagem."',resumo='".addslashes($_POST['resumo'])."',ordem='".$_POST['ordem']."',datamodificado=NOW(),autor2='".$_SESSION["usuario"]."',conteudo='".addslashes($_POST['conteudo'])."',status='".$_POST['status']."' WHERE idorienta='".$_POST['idorienta']."'");
	
				//redireciona para a pagina de sucesso
				header("Location:../principal.php?type=edorienta&id=".$_POST['idorienta']."");
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

	$campos = "autor,datamodificado,imagem,";
	$valores= "'".$_SESSION["usuario"]."',NOW(),'".$imagem."',";
	
	foreach($_POST as $k=>$value){		
		
		$value =  addslashes($value);	
								
		if( $k != "x" && $k != "y"){
			$campos.= "$k,";
			$valores.= "'$value',";
		}		
		
		
	}
	$campos = "(".substr($campos,0,strlen($campos)-1).")";
	$valores = "(".substr($valores,0,strlen($valores)-1).")";
	$sql = $mySQL->runQuery("INSERT INTO forteap_orienta ".$campos ." VALUES " .$valores);	
		header("Location:../principal.php?type=orienta");	
			exit;	
}
?>