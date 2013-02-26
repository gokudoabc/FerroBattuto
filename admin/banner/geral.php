<br/><br/><br/>
<form id="form1" name="form1" method="post" action="banner/action.php">      
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
          </td>
          </tr>
          <tr>
          <td>
          <h1><em>Banner</em></h1></td>
          </tr><tr><td>	<table>
        <tr><td></td><td>  <a href="principal.php?type=ibanner" class="bnt_inserir"><img src="_img/bnt_inserir.gif" width="73" height="22" border="0" /></a></td><td width="10"><div style="margin-left:5px; height:15px; width:1px; border-left:1px dotted #ccc;"></div></td><td><?php include("_includes/menu_opcoes.php");?></td></tr>
        </table>
       
          </tr>
        <tr>
          <td height="30"><?php //$Funcoes->contagem_registro($_GET['type'],'clt_banner');  ?><input type="hidden" name="type" id="type" value="<?php echo $_GET['type']; ?>" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="53%"></td>
          <td width="21%">&nbsp;</td>
          <td width="26%"><label for="textfield"></label>
            <input name="textfield" type="text" id="textfield" size="50" />
            <input type="submit" name="button" id="button" value="Buscar" /></td>
        </tr>
      </table>
      
      <br />
      <div class="bordaBox"> 
        <b class="b1"></b><b class="b2"></b><b class="b3"></b><b class="b4"></b>    
        <div class="conteudo">
      <table width="100%" cellspacing="0">
        <thead>
          <tr style="background:url(_img/bg_area.gif) repeat-x; color:#000;">
            <th width="2%" height="30" align="center"><input type="checkbox" name="selectAll" id="selectAll" value="" /></th>
            <th width="36%" height="30" align="left">Titulo</th>
            <th width="10%" height="30" align="left">Autor</th>
            <th width="12%" height="30" align="left">Data</th>
            <th width="14%" height="30" align="left">Status</th>
            <th width="4%" align="left">Ordem</th>
          </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        <?	
		
		switch ($_GET['status']) {		
		
		//página de noticias
		case 'publicado':
			$where = "where status='publicado'";
			break;
		case 'inativo':
			$where = "where status='inativo'";
			break;
		case 'lixo':
			$where = "where status='lixo'";
			break;
			
		}
		//INICIO: paginação
		//Determinar a primeira página
		$page = $_GET["page"];
		if (!$page) {
			$inicio = 0;
			$page=1;
		}
		else {
			$inicio = ($page - 1) * TOTAL_PAGINA;
		}	
			$sqlnoticia = $mySQL->runQuery("SELECT * FROM clt_banner ".$where." ");
				$b=mysql_num_rows($sqlnoticia);
					$sqlnoticia = $mySQL->runQuery("SELECT * FROM clt_banner ".$where." LIMIT ". $inicio . ",".TOTAL_PAGINA."");
						//calculo das páginas													
						$tpages= ceil($b/TOTAL_PAGINA);
						//echo "paginas ".$tpages;               
			
			$page   = intval($_GET['page']);
			$adjacents  = intval($_GET['adjacents']);
			
			if(!$page)  $page  = 1;
			if(!$adjacents) $adjacents = 5;
			
			$reload = $_SERVER['PHP_SELF'] . "?type=".$_GET['type']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;		
					$i=0;
					while($rsnoticia = mysql_fetch_array($sqlnoticia)) {
		?>
          <tr valign="top" class="post<?php echo $rsnoticia['idbanner']; ?> fundo<?php echo $i%2 ?>" onmouseover="posts('<?php echo $rsnoticia['idbanner']; ?>')" onmouseout="posts_out('<?php echo $rsnoticia['idbanner']; ?>')">
          
            <th valign="middle" scope="row"><input type="checkbox" name="id[]" value="<?php echo $rsnoticia['idbanner']; ?>" /></th>
            <td height="40" valign="middle">
            	<strong><a class="row-title" href="principal.php?type=edbanner&id=<?php echo $rsnoticia['idbanner']; ?>" title="Edit &ldquo;TEste&rdquo;"><?php echo $rsnoticia['titulo'];?></a></strong>
                <?php $Funcoes->opcoes_post($rsnoticia['idbanner'],$rsnoticia['status'],'banner/action.php','edbanner'); ?>
			</td>
            <td valign="middle"><?php echo $rsnoticia['autor']; ?></td>
            <td valign="middle"><?php echo $rsnoticia['datainserido']; ?></td>
            <td valign="middle"><?php echo $rsnoticia['status']; ?></td>
            <td valign="middle"><?php echo $rsnoticia['ordem']; ?></td>
            
          </tr>
		  <?php  } ?>
        </tbody>
      </table>
      </div>
      <b class="b4"></b><b class="b3"></b><b class="b2"></b><b class="b1"></b>
    </div>
      <br/>
      <select name="opcoes" id="opcoes">
        <option value="0">Escolha uma op&ccedil;&atilde;o</option>
        <option value="1">Apagar Selecionados</option>
        <option value="2">Editar Selecionados</option>
        <option value="3">Publicar Selecionados</option>
      </select>
      <input type="submit" name="aplicar" id="aplicar"  class="aplicar" value="" />
    </form>
   <div style="text-align:center;">Obrigatoriamente as imagens devem ter o tamanho de 960 x 250 pixels, resolução de 72 dpi (pixels por polegada), em padrão RGB. <br/>Use o Photoshop para recortar a imagem neste tamanho sem distorcê-la.<br/>
As frases temáticas de cada imagem devem ser editadas no Photoshop e salvas no arquivo JPG ou GIF final.</div>
   <br />
  <div style="text-align:center">
<?php
//Paginacao
if ($b>TOTAL_PAGINA){
include("pagination3.php");
echo paginate_three($reload, $page, $tpages, $adjacents);
}
?>
</div>
<br />