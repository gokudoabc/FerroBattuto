 <br/><br/><br/>
<form id="form1" name="form1" method="post" action="noticias/action.php">  
<table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
          <td><h1>Dicas</h1>
         </td>
          <td>
          <h1>&nbsp;</h1></td>
          <td>&nbsp;</td>
        </tr>
       
        <tr>
          <td height="30"><?php //$Funcoes->contagem_registro($_GET['type'],'clt_banner');  ?><input type="hidden" name="type" id="type" value="<?php echo $_GET['type']; ?>" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="53%"><table>
            <tr>
              <td></td>
              <td><a href="principal.php?type=inoticias" class="bnt_inserir"><img src="_img/bnt_inserir.gif" alt="" width="73" height="22" border="0" /></a></td>
              <td width="10"><div style="margin-left:5px; height:15px; width:1px; border-left:1px dotted #ccc;"></div></td>
              <td><?php include("_includes/menu_opcoes.php");?>
              
              </td>
            </tr>
          </table></td>
          <td width="21%">&nbsp;</td>
          <td width="26%"><label for="OBUS"></label>
            <input name="BSQ" type="text" id="BSQ" size="50" />
            <input type="submit" name="button" id="button" value="Buscar" /></td>
        </tr>
      </table>
      
      <br />
      <div class="bordaBox"> 
        <b class="b1"></b><b class="b2"></b><b class="b3"></b><b class="b4"></b>    
        <div class="conteudo">
        <div align="center">			
</div>
      <table width="100%" cellspacing="0">
        <thead>
          <tr style="background:url(_img/bg_area.gif) repeat-x; color:#000;">
            <th width="2%" height="30" align="center"><input type="checkbox" name="selectAll" id="selectAll" value="" /></th>
            <th width="36%" height="30" align="left">Titulo</th>
            <th width="22%" align="left">Resumo</th>
            <th width="10%" height="30" align="left">Autor</th>
            <th width="12%" height="30" align="left">Data</th>
            <th width="14%" height="30" align="left">Status</th>
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
		
				if($_GET['BSQ']){$arr = "WHERE titulo like '%".addslashes($_GET['BSQ'])."%' OR resumo like '%".addslashes($_GET['BSQ'])."%' OR artigo like '%".addslashes($_GET['BSQ'])."%'";} else {}

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
			$sqlnoticia = $mySQL->runQuery("SELECT * FROM fer_artigo ".$arr." ".$where." ");
				$b=mysql_num_rows($sqlnoticia);
					$sqlnoticia = $mySQL->runQuery("SELECT * FROM fer_artigo ".$arr." ".$where." LIMIT ". $inicio . ",".TOTAL_PAGINA."");
						//calculo das páginas													
						$tpages= ceil($b/TOTAL_PAGINA);
						//echo "paginas ".$tpages;               
			
			$page   = intval($_GET['page']);
			$adjacents  = intval($_GET['adjacents']);
			
			if(!$page)  $page  = 1;
			if(!$adjacents) $adjacents = 5;
									$paginaAberta = $page;

			$reload = $_SERVER['PHP_SELF'] . "?type=".$_GET['type']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;		
			
					$i=0;
					while($rsnoticia = mysql_fetch_array($sqlnoticia)) {
		?>
          <tr valign="top" class="post<?php echo $rsnoticia['idartigo']; ?> fundo<?php echo $i%2 ?>" onmouseover="posts('<?php echo $rsnoticia['idartigo']; ?>')" onmouseout="posts_out('<?php echo $rsnoticia['idartigo']; ?>')">
          
            <th valign="middle" scope="row"><A NAME="<?php echo $rsnoticia['idartigo']; ?>"></A><input type="checkbox" name="id[]" value="<?php echo $rsnoticia['idartigo']; ?>" /></th>
            <td height="40" valign="middle"><?php if($b){} else { echo "Nenhum cadastro encontrado"; }; ?> 
            	<strong><a class="row-title" href="principal.php?type=ednoticias&id=<?php echo $rsnoticia['idartigo']; ?>" title="Editar"><?php echo $rsnoticia['titulo'];?></a></strong>
                <?php $Funcoes->opcoes_post($rsnoticia['idartigo'],$rsnoticia['status'],'noticias/action.php','ednoticias',$paginaAberta); ?>
			</td>
            <td valign="middle"><?php   echo $rsnoticia['resumo']; ?></td>
            <td valign="middle"><?php echo $rsnoticia['autor']; ?></td>
            <td valign="middle"><?php echo $rsnoticia['datainserido']; ?></td>
<td valign="middle"><?php if($rsnoticia['status']=="inativo"){$cor = "ff0000"; } else if($rsnoticia['status']=="publicado"){$cor = "000"; } else {$cor = "ff0000"; }   ?><span style="color:#<?php echo $cor; ?>"><?php if($rsnoticia['status']=="inativo"){$fala = "Desativado"; } else if($rsnoticia['status']=="publicado"){$fala = "Ativo"; } else if($rsnoticia['status']=="lixo"){$fala = "Lixo"; }   echo $fala; ?></span></td>            
          </tr>
		  <?php }?>
        </tbody>
      </table>
      </div>
      <b class="b4"></b><b class="b3"></b><b class="b2"></b><b class="b1"></b>
    </div>
      <br/>
<?php include("_includes/menu_opcoes.php");?>
    </form>
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