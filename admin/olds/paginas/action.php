<?php
include("../../_includes/conexao.php");
include("../_includes/funcoes.php");
include('../_includes/class.upload.php');

//diretorio do upload
$dir_dest = '../../_imgs/_ups';	
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
				$sql = $mySQL->runQuery("UPDATE for_paginas SET  status='lixo' WHERE idpagina='".$values."'");
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE for_paginas SET  status='lixo' WHERE idpagina='4'");
		}
			header("Location:../principal.php?type=onde");					
	break;
	
	case 'inativo':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE for_paginas SET  status='inativo' WHERE idpagina='".$values."'");	
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE for_paginas SET  status='inativo' WHERE idpagina='4'");	
		}
			header("Location:../principal.php?type=onde");		
	break;
	
	case 'publicado':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE for_paginas SET  status='publicado' WHERE idpagina='".$values."'");
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE for_paginas SET  status='publicado' WHERE idpagina='4'");
		}
			header("Location:../principal.php?type=onde");		
	break;
	case 'restaurar':
		$sql = $mySQL->runQuery("UPDATE for_paginas SET  status='inativo' WHERE idpagina='4'");
			header("Location:../principal.php?type=onde");		
	break;
	case 'deletar':
		$sql = $mySQL->runQuery("DELETE FROM for_paginas WHERE idpagina='4'");
			header("Location:../principal.php?type=onde");		
	break;
	
	case 'pub_todos':
		print_r($_POST['id']);
	break;
}

if($_POST['opt']=='editar') {

	$sql = $mySQL->runQuery("UPDATE for_paginas SET pagina='".$_POST['pagina']."', status='".$_POST['status']."' WHERE idpagina='4'");
			
				//redireciona para a pagina de sucesso
				header("Location:../principal.php?type=onde");
				exit;	
} elseif($_POST['opt']=='deletar') {
	$sql = $mySQL->runQuery("UPDATE for_pais SET  status='lixo'");
		//redireciona para a pagina de sucesso
				header("Location:index.php?msg=lixo");
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
	$sql = $mySQL->runQuery("INSERT INTO for_pais ".$campos ." VALUES " . $valores);	
		header("Location:../principal.php?type=noticia");	
			exit;	
}
?>