<script language="JavaScript">

<!--

   function enviar(opcao) {

      //OPÇÃO EXCLUIR SELECIONADA

	  if(opcao == 'E') {

		 document.forms[2].submit();

      }//FECHA IF

	  

	  //OPÇÃO ATUALIZAR SELECIONADA

	  if(opcao == 'A') {

	     document.forms[1].opc_atualizar.value = 1;

		 document.forms[1].submit();

      }//FECHA IF

	  

	  //OPÇÃO FINALIZAR SELECIONADA

	  if(opcao == 'F') {

	     document.forms[1].opc_finalizar.value = 1;

		 document.forms[1].action = "finalizar.php";

		 document.forms[1].submit();

      }//FECHA IF

	  

   }//FECHA FUNCTION

//-->

</script>

<br/><br/><br/>
<form id="form1" name="form1" method="post" action="galeria/action.php">      
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
          <td><h1>Projetos - Imagens</h1></td>
          <td><h1>&nbsp;</h1></td>
          <td>&nbsp;</td>
		</tr>
		<tr>
          <td height="30"><input type="hidden" name="type" id="type" value="<?php echo $_GET['type']; ?>" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
		</tr>
		<tr>
          <td width="100%">

          <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td>&nbsp;</td>
              <td><a href="principal.php?type=igaleria" class="bnt_inserir"><img src="_img/bnt_inserir.gif" alt="" width="73" height="22" border="0" /></a></td>
              <td>

              	<table border="0" cellpadding="0" cellspacing="0" width="100%" >
                	<tr>
                      <td width="600"><?php include("_includes/menu_opcoes.php");?></td>              
                      <td>&nbsp;</td>
				      <td>

						<form action="abre.php" method="post" name="seleciona" id="seleciona">
                            <table cellpadding="0" cellspacing="0" width="400">
                                  <tr>
                                      <td>Filtre imagens por categoria:
                                        <select name="categoriaAbre" id="categoriaAbre" >
                                            <option value="0">Escolha uma categoria</option>
                                            <?php $sqlmarca = $mySQL->runQuery("SELECT idcategoria,nome,status FROM fer_categorias_galeria");
                                                   while($rsmarca = mysql_fetch_array($sqlmarca)) { ?>
                                            <option value="<?php echo $rsmarca['idcategoria']; ?>"><?php echo $rsmarca['nome']; ?></option>
                                          <?php } ?>
                                      	</select></td>
                                      <td><input type="image" src="_img/bnt_aplicar.gif" value="submit"></td>
                                  </tr>
                            </table>
						</form>


				      </td>
					</tr>
              	</table>

              </td>
            </tr>
          </table>

          </td>
        </tr>
	</table>
      
      <br />
      <div class="bordaBox"> 
 
        <div class="conteudo">

      <table width="100%" cellspacing="0">
        <thead>
          <tr style="background:url(_img/bg_area.gif) repeat-x; color:#000;">
            <th width="2%" height="30" align="center"><input type="checkbox" name="selectAll" id="selectAll" value="" /></th>
            <th width="70%" height="30" align="left">Titulo</th>
             <th width="20%" height="30" align="left">Categoria</th>

            <th width="8%" height="30" align="left">Status</th>
          </tr>
        </thead>
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
		
		if($_GET['id']){if($where){$and = "AND"; } else { $and = "WHERE";}  $arr = "idcategoria=".$_GET['id']." ";} else {}
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
			$sqlnoticia = $mySQL->runQuery("SELECT * FROM fer_galeria ".$where." ".$and." ".$arr." ");
				$b=mysql_num_rows($sqlnoticia);
					$sqlnoticia = $mySQL->runQuery("SELECT * FROM fer_galeria ".$where." ".$and." ".$arr." ORDER BY idcategoria ASC LIMIT ". $inicio . ",".TOTAL_PAGINA."");
						//calculo das páginas													
						$tpages= ceil($b/TOTAL_PAGINA);
						//echo "paginas ".$tpages;               
			
			$page   = intval($_GET['page']);
			$adjacents  = intval($_GET['adjacents']);
			if(!$page)  $page  = 1;
						$paginaAberta = $page;

			if(!$adjacents) $adjacents = 5;
			
			$reload = $_SERVER['PHP_SELF'] . "?type=".$_GET['type']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;		
					$i=0;
					while($rsnoticia = mysql_fetch_array($sqlnoticia)) {
		?>
          <tr valign="top" class="post<?php echo $rsnoticia['idgaleria']; ?> fundo<?php echo $i%2 ?>" onmouseover="posts('<?php echo $rsnoticia['idgaleria']; ?>')" onmouseout="posts_out('<?php echo $rsnoticia['idgaleria']; ?>')">
          
            <th valign="middle" scope="row"><input type="checkbox" name="id[]" value="<?php echo $rsnoticia['idgaleria']; ?>" /></th>
            <td height="40" valign="middle">
            	<strong><a class="row-title" href="principal.php?type=edgaleria&id=<?php echo $rsnoticia['idgaleria']; ?>" title="Edit"><img src="../imagem_banner.php?src=_imgs/_ups/<?php echo $rsnoticia['imagem']; ?>&w=92&h=62&zc=2" class="bordaimg2"  width="92" height="62" style="border:1px solid #CCC; margin:5px; padding:1px; float:left;"><?php echo $rsnoticia['nome'];?></a></strong>
                <?php $Funcoes->opcoes_post($rsnoticia['idgaleria'],$rsnoticia['status'],'galeria/action.php','edgaleria',$paginaAberta); ?>
			</td>
                        <td valign="middle" style="font-size:14px; font-weight:bold;"><?php $idVaiPuxar = $rsnoticia['idcategoria']; ?><?php 
						$sqlCategoria = $mySQL->runQuery("SELECT * FROM fer_categorias_galeria WHERE idcategoria = $idVaiPuxar ");
						$rsPuxa = mysql_fetch_array($sqlCategoria); 
			echo $rsPuxa['nome']; ?></td>

            <td valign="middle"><?php if($rsnoticia['status']=="inativo"){$cor = "ff0000"; } else if($rsnoticia['status']=="publicado"){$cor = "000"; } else {$cor = "ff0000"; }   ?><span style="color:#<?php echo $cor; ?>"><?php if($rsnoticia['status']=="inativo"){$fala = "Desativado"; } else if($rsnoticia['status']=="publicado"){$fala = "Ativo"; } else if($rsnoticia['status']=="lixo"){$fala = "Lixo"; }   echo $fala; ?></span></td>
            
          </tr>
		  <?php  } ?>
        </tbody>
      </table>


      </div>
      
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