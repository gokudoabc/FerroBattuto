<?php
include("../../_includes/conexao.php");
include("../_includes/funcoes.php");
include('../_includes/class.upload.php');

//diretorio do upload
$dir_dest = '../../_img/_institucional';	
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
				$sql = $mySQL->runQuery("UPDATE forteap_institucinal SET  status='lixo' WHERE idinstitucinal='".$values."'");	
				echo "UPDATE forteap_institucinal SET  status='lixo' WHERE idinstitucinal='".$values."'";
				}
			}
			
		} else {	
			$sql = $mySQL->runQuery("UPDATE forteap_institucinal SET  status='lixo' WHERE idinstitucinal='".$_GET['id']."'");	
		}
			header("Location:../principal.php?type=institucional");					
	break;
	
	case 'inativo':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE forteap_institucinal SET  status='inativo' WHERE idinstitucinal='".$values."'");			
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE forteap_institucinal SET  status='inativo' WHERE idinstitucinal='".$_GET['id']."'");	
		}
			header("Location:../principal.php?type=institucional");		
	break;
	
	case 'publicado':
		if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE forteap_institucinal SET  status='publicado' WHERE idinstitucinal='".$values."'");	
				echo "UPDATE forteap_institucinal SET  status='publicado' WHERE idinstitucinal='".$values."'";
				}
			}
			
		} else {
		$sql = $mySQL->runQuery("UPDATE forteap_institucinal SET  status='publicado' WHERE idinstitucinal='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=institucional");		
	break;
	case 'restaurar':
		$sql = $mySQL->runQuery("UPDATE forteap_institucinal SET  status='inativo' WHERE idinstitucinal='".$_GET['id']."'");
			header("Location:../principal.php?type=institucional");		
	break;
	case 'deletar':
		$sql = $mySQL->runQuery("DELETE FROM forteap_institucinal WHERE idinstitucinal ='".$_GET['id']."'");
			header("Location:../principal.php?type=institucional");		
	break;
	
	case 'pub_todos':
		print_r($_POST['id']);
	break;
}

if($_POST['opt']=='editar') {
	
	$sql = $mySQL->runQuery("UPDATE forteap_institucinal SET  titulo='".$_POST['titulo']."',conteudo='".$_POST['conteudo']."',imagem='".$imagem."',ordem='".$_POST['ordem']."',datamodificado=NOW(),autor2='".$_SESSION["usuario"]."',ordem='".$_POST['ordem']."',status='".$_POST['status']."' WHERE idinstitucinal='".$_POST['idinstitucinal']."'");	
				//redireciona para a pagina de sucesso
				header("Location:../principal.php?type=edinstitucional&id=".$_POST['idinstitucinal']."");
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

	//campos adicionais 
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
	
	$sql = $mySQL->runQuery("INSERT INTO forteap_institucinal ".$campos ." VALUES " . $valores);	
		header("Location:../principal.php?type=institucional");	
			exit;	
}
?>