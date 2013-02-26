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
				$sql = $mySQL->runQuery("UPDATE clt_banner SET  status='lixo' WHERE idbanner='".$values."'");
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE clt_banner SET  status='lixo' WHERE idbanner='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=banner");					
	break;
	
	case 'inativo':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE clt_banner SET  status='inativo' WHERE idbanner='".$values."'");	
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE clt_banner SET  status='inativo' WHERE idbanner='".$_GET['id']."'");	
		}
			header("Location:../principal.php?type=banner");		
	break;
	
	case 'publicado':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE clt_banner SET  status='publicado' WHERE idbanner='".$values."'");
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE clt_banner SET  status='publicado' WHERE idbanner='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=banner");		
	break;
	case 'restaurar':
		$sql = $mySQL->runQuery("UPDATE clt_banner SET  status='inativo' WHERE idbanner='".$_GET['id']."'");
			header("Location:../principal.php?type=banner");		
	break;
	case 'deletar':
		$sql = $mySQL->runQuery("DELETE FROM clt_banner WHERE idbanner ='".$_GET['id']."'");
			header("Location:../principal.php?type=banner");		
	break;
	
	case 'pub_todos':
		print_r($_POST['id']);
	break;
}

if($_POST['opt']=='editar') {
	
	$campoImagem = 'imagem';	
$diretorioIMG = '../../_imgs/_banner';

if ($_FILES[$campoImagem]['name'] !=""){
					$imagem = $_FILES[$campoImagem]['tmp_name'];
					$imagem_name = $_FILES[$campoImagem]['name'];
					$imagem_type = $_FILES[$campoImagem]['type'];
					$imagem_size = $_FILES[$campoImagem]['size'];
					
						if (!is_dir("$diretorioIMG")){ 
							mkdir("$diretorioIMG", 0777,true);
						} 
						if (move_uploaded_file($imagem,"$diretorioIMG/".$imagem_name)){
								$imagem=$imagem_name;
						}
				} else {
					if($_POST['imagem_delete']==1) {
				$imagem = '';
			} else {
						$imagem=$_POST['img_old'];
			}
				}

	$sql = $mySQL->runQuery("UPDATE clt_banner SET  titulo='".$_POST['titulo']."',url='".$_POST['url']."',imagem='".$imagem."',ordem='".$_POST['ordem']."',datamodificado=NOW(),autor2='".$_POST['autor2']."',status='".$_POST['status']."' WHERE idbanner='".$_POST['idbanner']."'");
				//redireciona para a pagina de sucesso
				header("Location:../principal.php?type=edbanner&id=".$_POST['idbanner']."");
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
$diretorioIMG = '../../_imgs/_banner';

	$campos = "autor,datainserido,";
	$valores= "'".$_SESSION['nomeuser']."',NOW(),";
	foreach($_POST as $k=>$value){
		
		if( $k != "x" && $k != "y"){
			$campos.= "$k,";
				$valores.="'$value',";
		}		
		
		if (isset($_FILES[$campoImagem])){
					$imagem = $_FILES[$campoImagem]['tmp_name'];
					$imagem_name = $_FILES[$campoImagem]['name'];
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
	$sql = $mySQL->runQuery("INSERT INTO clt_banner ".$campos ." VALUES " . $valores);	
		header("Location:../principal.php?type=banner");	
			exit;	
}
?>