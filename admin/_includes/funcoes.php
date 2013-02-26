<?php


$tituloadmin = "Arte mobile - Administração";
$tamanhoBannerW = "900";
$tamanhoBannerh = "900";

class Funcoes extends MySQL {

function Logger($msg){
 
$data = date("d-m-y");
$hora = date("H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
 
//Nome do arquivo:
$arquivo = "Logger_$data.txt";
 
//Texto a ser impresso no log:
$texto = "[$hora][$ip]> $msg \n";
 
$manipular = fopen("_logs/$arquivo", "a+b");
fwrite($manipular, $texto);
fclose($manipular);
 
}

function escape($str)
        {
                $search=array("\\","\0","\n","\r","\x1a","'",'"');
                $replace=array("\\\\","\\0","\\n","\\r","\Z","\'",'\"');
                return str_replace($search,$replace,$str);
        }

function opcoes_post($id,$status,$pagina,$type,$page){
	
	$dados = '
	<div class="opcoes_post'.$id.'" style="display:none;" id="'.$id.'">
		<a href="principal.php?type='.$type.'&id='.$id.'">Editar</a> | ';	
			if($status=='lixo' ) { 
	$dados .= '<a href="#'.$id.'" onclick="restaurar('.$id.',\''.$pagina.'\','.$page.');">Restaurar</a> | 
		<a href="#" onclick="deletar('.$id.',\''.$pagina.'\','.$page.');">Deletar</a>';
			} else {
	$dados .= '<a href="#'.$id.'" onclick="lixo('.$id.',\''.$pagina.'\','.$page.');">Apagar</a> | ';
			if($status!='lixo') { if($status=='' || $status=='inativo' ) { 
	$dados .= '<a href="#'.$id.'" onclick="publicar('.$id.',\''.$pagina.'\','.$page.');">Ativar</a>';
			} else {
	$dados .= '<a href="#'.$id.'" onclick="inativo('.$id.',\''.$pagina.'\','.$page.');">Desativar</a>'; 
			} }
			}
	
	$dados .= '</div>';
	
	echo $dados;
}

function contagem_registro($type, $tabela){
	$valor = '<a href="principal.php?type='.$type.'" title="Todos">Todos</a> (<strong>'.$this->countQuery($tabela).'</strong>) | 
			<a href="principal.php?type='.$type.'&status=publicado" title="Publicado">Publicados</a> (<strong>'.$this->countQuery($tabela,'status="publicado"').'</strong>)  | 
			<a href="principal.php?type='.$type.'&status=inativo" title="Todos">Inativo</a> (<strong>'.$this->countQuery($tabela,'status="inativo"').'</strong>)  | 
			<a href="principal.php?type='.$type.'&status=lixo" title="Lixo">Lixeira</a> (<strong>'.$this->countQuery($tabela,'status="lixo"').'</strong>)
			';
	
	
	echo $valor;
	
}

}

$Funcoes = new Funcoes;

?>