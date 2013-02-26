<?php 

include('_includes/conexao.php');

header('Content-type: application/vnd.ms-excel');
header('Content-type: application/force-download');
header('Content-Disposition: attachment; filename=relatorio.xls');
header('Pragma: no-cache');

switch ($_GET['dados']) {
	
	case 'noticia':
		
		echo '<table width="100%" border="1" cellpadding="0" cellspacing="0">
				<tr bgcolor="#CCCCCC">
					<td>ID</td>
					<td>Titulo</td>
					<td>Resumo</td>
					<td>Noticia</td>
					<td>Data Inserção</td>
					<td>Autor</td>
					<td>Data Modificação</td>
					<td>Autor</td>
					<td>Ordem</td>
					<td>Status</td>
				</tr>
		';
		
		$sqlvizu= $mySQL->runQuery("SELECT * FROM noticia");
			while ($rs_vizu = mysql_fetch_array($sqlvizu)) {
				
				echo '					
 					<tr valign="top">
						<td valign="top">'.$rs_vizu['idnoticia'].'</td>
						<td valign="top">'.$rs_vizu['titulo'].'</td>
						<td valign="top">'.$rs_vizu['resumo'].'</td>
						<td valign="top">'.$rs_vizu['noticia'].'</td>
						<td valign="top">'.$rs_vizu['datainserido'].'</td>
						<td valign="top">'.$rs_vizu['autor'].'</td>
						<td valign="top">'.$rs_vizu['datamodificado'].'</td>
						<td valign="top">'.$rs_vizu['autor2'].'</td>
						<td valign="top">'.$rs_vizu['ordem'].'</td>
						<td valign="top">'.$rs_vizu['status'].'</td>
					</tr>				
				';
				
			}
	
		echo '</table>';
		
		
		break;
		
		
	default:
		echo 'Nemhum arquivo selecionado para exportar';
	break;
	
	
}


?>