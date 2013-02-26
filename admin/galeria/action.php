<?php
include("../../_includes/conexao.php");
include('../_includes/class.upload.php');
if($_POST['categoriaAbre']){
	$cataaa = $_POST['categoriaAbre'];
				header("Location:../principal.php?type=galeria&id=".$_POST['categoriaAbre']."");
	
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
				$sql = $mySQL->runQuery("UPDATE fer_galeria SET  status='lixo' WHERE idgaleria='".$values."'");
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE fer_galeria SET  status='lixo' WHERE idgaleria='".$_GET['id']."'");
		}
	
			header("Location:../principal.php?type=galeria&page=".$_GET['page']."");					
	break;
	
	case 'inativo':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE fer_galeria SET  status='inativo' WHERE idgaleria='".$values."'");	
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE fer_galeria SET  status='inativo' WHERE idgaleria='".$_GET['id']."'");	
		}
			header("Location:../principal.php?type=galeria&page=".$_GET['page']."");					
	break;
	
	case 'publicado':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE fer_galeria SET  status='publicado' WHERE idgaleria='".$values."'");
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE fer_galeria SET  status='publicado' WHERE idgaleria='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=galeria&page=".$_GET['page']."");					
	break;
	case 'restaurar':
		$sql = $mySQL->runQuery("UPDATE fer_galeria SET  status='inativo' WHERE idgaleria='".$_GET['id']."'");
			header("Location:../principal.php?type=galeria&page=".$_GET['page']."");					
	break;
	case 'deletar':
		$sql = $mySQL->runQuery("DELETE FROM fer_galeria WHERE idgaleria ='".$_GET['id']."'");
			header("Location:../principal.php?type=galeria&page=".$_GET['page']."");					
	break;
	
	case 'pub_todos':
		print_r($_POST['id']);
	break;
}

if($_POST['opt']=='editar') {
	

	$sql = $mySQL->runQuery("UPDATE fer_galeria SET  
	nome='".$_POST['nome']."',
	idcategoria='".$_POST['idcategoria']."',
	lingua='".$_POST['lingua']."',
	imagem='".$imagem."',
	status='".$_POST['status']."' 
	
	WHERE idgaleria='".$_POST['idgaleria']."'");
				//redireciona para a pagina de sucesso
				header("Location:../principal.php?type=edgaleria&id=".$_POST['idgaleria']."");
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
$diretorioIMG = '../../_imgs/_ups';

	foreach($_POST as $k=>$value){
		
		if( $k != "x" && $k != "y"){
			$campos.= "$k,";
				$valores.="'$value',";
		}		
		
		if (isset($_FILES[$campoImagem])){
					$file = $_FILES[$campoImagem]['name'];
    				$a = pathinfo($file);
					$basename = $a['basename'];
				    $filename = $a['filename'];
				    $extension = $a['extension'];

					$imagem = $_FILES[$campoImagem]['tmp_name'];
					$imagem_name = md5($_FILES[$campoImagem]['name']).".".$extension;
					$imagem_type = $_FILES[$campoImagem]['type'];
					$imagem_size = $_FILES[$campoImagem]['size'];
				  

						if (!is_dir("$diretorioIMG")){ 
							mkdir("$diretorioIMG", 0777,true);
						} 
						if (move_uploaded_file($imagem,"$diretorioIMG/".$imagem_name)){
							$msg .= " Upload completado ";
							$campos.= "$campoImagem,";
							$valores.="'$imagem_name',";
						}
				}
		
	}
	$campos = "(".substr($campos,0,strlen($campos)-1).")";
	$valores = "(".substr($valores,0,strlen($valores)-1).")";
	$sql = $mySQL->runQuery("INSERT INTO fer_galeria ".$campos ." VALUES " . $valores);	
		header("Location:../principal.php?type=galeria");	
			exit;	
}
?>