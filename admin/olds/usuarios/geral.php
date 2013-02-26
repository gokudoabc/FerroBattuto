<br/><br/><br/>
<form id="form1" name="form1" method="post" action="usuarios/action.php">      
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><h1><em>Usuarios</em>
        </h1></td><?php include("_includes/exportar.php"); ?>
          </tr>
        <tr>
          <td height="30"><?php //$Funcoes->contagem_registro($_GET['type'],'forteap_clientes');  ?> <input type="hidden" name="type" id="type" value="<?php echo $_GET['type']; ?>" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="53%"><?php include("_includes/menu_opcoes.php");?></td>
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
            <th width="36%" height="30" align="left">Nome</th>
            <th width="22%" align="left">E-mail</th>
            <th width="12%" height="30" align="left">Data</th>
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
			$sqlnoticia = $mySQL->runQuery("SELECT * FROM for_profissionais ".$where." ");
				$b=mysql_num_rows($sqlnoticia);
					$sqlnoticia = $mySQL->runQuery("SELECT * FROM for_profissionais ".$where." LIMIT ". $inicio . ",".TOTAL_PAGINA."");
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
          <tr valign="top" class="post<?php echo $rsnoticia['idprofissional']; ?> fundo<?php echo $i%2 ?>" onmouseover="posts('<?php echo $rsnoticia['idprofissional']; ?>')" onmouseout="posts_out('<?php echo $rsnoticia['idprofissional']; ?>')">
          
            <th valign="middle" scope="row"><input type="checkbox" name="id[]" value="<?php echo $rsnoticia['idprofissional']; ?>" /></th>
            <td height="40" valign="middle">
            	<strong><a class="row-title" href="principal.php?type=edusuarios&id=<?php echo $rsnoticia['idprofissional']; ?>" ><?php echo $rsnoticia['nome'];?></a></strong>
                <?php $Funcoes->opcoes_post($rsnoticia['idprofissional'],$rsnoticia['status'],'usuarios/action.php','edusuarios'); ?>
			</td>
            <td valign="middle"><?php echo $rsnoticia['email']; ?></td>
            <td valign="middle"><?php echo $rsnoticia['data_cadastro']; ?></td>
            
          </tr>
		  <?php } ?>
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