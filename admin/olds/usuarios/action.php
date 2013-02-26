<?php
include("../../_includes/conexao.php");
include("../_includes/funcoes.php");
include('../_includes/class.upload.php');

//diretorio do upload
$dir_dest = '../../_img/_clientes';	
//inicio do upload	
$handle = new Upload($_FILES['imagem']);   
    if ($handle->uploaded) {		
		$temp = substr(md5(uniqid(time())), 0, 10);
       	$handle->file_new_name_body   = $temp;
	    $handle->image_resize            = true;
        $handle->image_y          		= 115;
        $handle->image_x                 = 107;
       
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
				$sql = $mySQL->runQuery("UPDATE for_profissionais SET  status='lixo' WHERE idprofissional='".$values."'");				
				}
			}			
		} else {	
		$sql = $mySQL->runQuery("UPDATE for_profissionais SET  status='lixo' WHERE idprofissional='".$_GET['id']."'");	
		}
			header("Location:../principal.php?type=clientes");					
	break;
	
	case 'inativo':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE for_profissionais SET  status='inativo' WHERE idprofissional='".$values."'");				
				}
			}			
		} else {
		$sql = $mySQL->runQuery("UPDATE for_profissionais SET  status='inativo' WHERE idprofissional='".$_GET['id']."'");	
		}
			header("Location:../principal.php?type=usuarios");		
	break;
	
	case 'publicado':
	if($_GET['opcao']=='1') {
			foreach($ids_explode as $values) {
				if($values !='') {
				$sql = $mySQL->runQuery("UPDATE for_profissionais SET  status='publicado' WHERE idprofissional='".$values."'");			
				}
			}			
		} else {
		$sql = $mySQL->runQuery("UPDATE for_profissionais SET  status='publicado' WHERE idprofissional='".$_GET['id']."'");
		}
			header("Location:../principal.php?type=usuarios");		
	break;
	case 'restaurar':
		$sql = $mySQL->runQuery("UPDATE for_profissionais SET  status='inativo' WHERE idprofissional='".$_GET['id']."'");
			header("Location:../principal.php?type=usuarios");		
	break;
	case 'deletar':
		$sql = $mySQL->runQuery("DELETE FROM for_profissionais WHERE idprofissional ='".$_GET['id']."'");
			header("Location:../principal.php?type=usuarios");		
	break;
	
	case 'pub_todos':
		print_r($_POST['id']);
	break;
}

if($_POST['opt']=='editar') {
	
	$sql = $mySQL->runQuery("UPDATE for_profissionais SET  
nome				='".$_POST['nome']."',
endereco			='".$_POST['endereco']."',
numero				='".$_POST['numero']."',
complemento			='".$_POST['complemento']."',
bairro				='".$_POST['bairro']."',
tipo_endereco		='".$_POST['tipo_endereco']."',
data_nascimento		='".$_POST['data_nascimento']."',
email				='".$_POST['email']."',
telefone			='".$_POST['telefone']."',
tipo_telefone		='".$_POST['tipo_telefone']."',
tipo_registro		='".$_POST['tipo_registro']."',
registro			='".$_POST['registro']."',
uf					='".$_POST['uf']."',
cidade				='".$_POST['cidade']."',
especialidade		='".$_POST['especialidade']."',
autoriza			='".$_POST['autoriza']."',
status				='".$_POST['status']."',
datamodificado=NOW(),
autor2='".$_SESSION["usuario"]."'

	
	WHERE idprofissional='".$_POST['idprofissional']."'");
				//redireciona para a pagina de sucesso
				header("Location:../principal.php?type=edusuarios&id=".$_POST['idprofissional']."");
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
$diretorioIMG = 'teste';

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
	$sql = $mySQL->runQuery("INSERT INTO neo_profissionais ".$campos ." VALUES " . $valores);	
		header("Location:../principal.php?type=usuarios");	
			exit;	
}
?>