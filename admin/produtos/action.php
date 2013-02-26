<?php
ob_start();
include("../../_includes/conexao.php");
include("../_includes/funcoes.php");
include('../_includes/class.upload.php');

//diretorio do upload
$dir_dest = '../../_imgs/_produtos';	
//inicio do upload	
$handle = new Upload($_FILES['imagem']);   
    if ($handle->uploaded) {		
		$temp = substr(md5(uniqid(time())), 0, 10);
       	$handle->file_new_name_body   = $temp;
	    $handle->image_resize            = true;
        $handle->image_ratio_y          = true;
        $handle->image_x                 = 368;
       
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
				$sql = $mySQL->runQuery("UPDATE clt_produtos SET  status='lixo' WHERE idproduto='".$values."'");
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE clt_produtos SET  status='lixo' WHERE idproduto='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=produtos");					
	break;
	
	case 'inativo':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE clt_produtos SET  status='inativo' WHERE idproduto='".$values."'");	
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE clt_produtos SET  status='inativo' WHERE idproduto='".$_GET['id']."'");	
		}
			header("Location:../principal.php?type=produtos");		
	break;
	
	case 'publicado':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE clt_produtos SET  status='publicado' WHERE idproduto='".$values."'");
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE clt_produtos SET  status='publicado' WHERE idproduto='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=produtos");		
	break;
	case 'restaurar':
		$sql = $mySQL->runQuery("UPDATE clt_produtos SET  status='inativo' WHERE idproduto='".$_GET['id']."'");
			header("Location:../principal.php?type=produtos");		
	break;
	case 'deletar':
		$sql = $mySQL->runQuery("DELETE FROM clt_produtos WHERE idproduto ='".$_GET['id']."'");
			header("Location:../principal.php?type=produtos");		
	break;
	
	case 'pub_todos':
		print_r($_POST['id']);
	break;
}

if($_POST['opt']=='editar') {

	$sql = $mySQL->runQuery("UPDATE clt_produtos SET  
			nome='".$_POST['nome']."',
			descricao='".$_POST['descricao']."',
			imagem='".$imagem."',
			autor='".$_POST['autor']."',
			idcategoria='".$_POST['idcategoria']."',
			status='".$_POST['status']."' 
			WHERE idproduto='".$_POST['idproduto']."'");
			
				//redireciona para a pagina de sucesso
				header("Location:../principal.php?type=edprodutos&id=".$_POST['idproduto']."");
				exit;	
} elseif($_POST['opt']=='deletar') {
	$sql = $mySQL->runQuery("UPDATE clt_produtos SET  status='lixo' WHERE idproduto='".$_POST['idproduto']."'");
		//redireciona para a pagina de sucesso
				header("Location:../principal.php?type=produtos&msg=lixo");
				exit;		
} elseif($_POST['opt']=='inserir' || $_POST['opt']=='editar') {
	
	
//DESABILITA O BOTAO DE SUBMIT
unset($_POST['inserir']);
unset($_POST['opt']);

$campoImagem = 'imagem';	
$diretorioIMG = '../../_imgs/_produtos';

	$campos = "autor,imagem,";
	$valores= "'".$_SESSION['nomeuser']."',NOW(),'".$imagem."',";
	foreach($_POST as $k=>$value){
		
		if( $k != "x" && $k != "y"){
			$campos.= "$k,";
				$valores.="'$value',";
		}
		
	}
	$campos = "(".substr($campos,0,strlen($campos)-1).")";
	$valores = "(".substr($valores,0,strlen($valores)-1).")";
	$sql = $mySQL->runQuery("INSERT INTO clt_produtos ".$campos ." VALUES " . $valores);	
		header("Location:../principal.php?type=produtos");	
			exit;	
}
?>