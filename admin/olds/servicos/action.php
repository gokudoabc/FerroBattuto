<?php
include("../../_includes/conexao.php");
include("../_includes/funcoes.php");
include('../_includes/class.upload.php');

//diretorio do upload
$dir_dest = '../../_img/_servicos';	
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
				$sql = $mySQL->runQuery("UPDATE forteap_servicos SET  status='lixo' WHERE idservicos='".$values."'");				
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE forteap_servicos SET  status='lixo' WHERE idservicos='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=servicos");					
	break;
	
	case 'inativo':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE forteap_servicos SET  status='inativo' WHERE idservicos='".$values."'");		
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE forteap_servicos SET  status='inativo' WHERE idservicos='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=servicos");		
	break;
	
	case 'publicado':
		if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE forteap_servicos SET  status='publicado' WHERE idservicos='".$values."'");
				}
			}
			
		} else {
		$sql = $mySQL->runQuery("UPDATE forteap_servicos SET  status='publicado' WHERE idservicos='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=servicos");		
	break;
	case 'restaurar':
		$sql = $mySQL->runQuery("UPDATE forteap_servicos SET  status='inativo' WHERE idservicos='".$_GET['id']."'");
			header("Location:../principal.php?type=servicos");		
	break;
	case 'deletar':
		$sql = $mySQL->runQuery("DELETE FROM forteap_servicos WHERE idservicos ='".$_GET['id']."'");
			header("Location:../principal.php?type=servicos");		
	break;
	
	case 'pub_todos':
		print_r($_POST['id']);
	break;
}

if($_POST['opt']=='editar') {
	
	$sql = $mySQL->runQuery("UPDATE forteap_servicos SET  titulo='".$_POST['titulo']."',titulo_menu ='".$_POST['titulo_menu']."',imagem='".$imagem."',resumo='".$_POST['resumo']."',ordem='".$_POST['ordem']."',datamodificado=NOW(),autor2='".$_SESSION["usuario"]."',conteudo='".$_POST['conteudo']."',status='".$_POST['status']."' WHERE idservicos='".$_POST['idservicos']."'");
		
				//redireciona para a pagina de sucesso
				header("Location:../principal.php?type=edservico&id=".$_POST['idservicos']."");
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
		
		if( $k != "x" && $k != "y"){
			$campos.= "$k,";
				$valores.="'$value',";
		}		
		
		
	}
	$campos = "(".substr($campos,0,strlen($campos)-1).")";
	$valores = "(".substr($valores,0,strlen($valores)-1).")";	
	$sql = $mySQL->runQuery("INSERT INTO forteap_servicos ".$campos ." VALUES " . $valores);	
		header("Location:../principal.php?type=servicos");	
			exit;	
}
?>