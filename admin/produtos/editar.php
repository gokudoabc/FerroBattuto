<br/><br/><br/>
<?php $sqlnoticia = $mySQL->runQuery("SELECT * FROM clt_produtos WHERE idproduto='".$_GET['id']."'");
			$rsnoticia = mysql_fetch_array($sqlnoticia);
															?>
      <form action="produtos/action.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      	 <input name="opt" type="hidden" id="opt" value="editar" />
            <input name="idproduto" type="hidden" id="idproduto" value="<?php echo $rsnoticia['idproduto']; ?>" />
            <input name="img_old" type="hidden" id="img_old" value="<?php echo $rsnoticia['imagem']; ?>" />      
                        <input name="autor2" type="hidden" id="autor2" value="<?php echo $_SESSION["nomeuser"]; ?>" />

      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td colspan="3"><h1><em>Editar Produto</em>
           
          </h1></td>
        </tr>        
        <tr>
          <td height="5" colspan="2" align="center" bgcolor="#EFEFEF"></td>
          <td width="56%" rowspan="5" valign="top">
           </td>        
        <tr>
          <td colspan="2" align="center" bgcolor="#EFEFEF"><table width="95%" border="0" align="center" cellpadding="3" cellspacing="3">
            <tr>
              <td colspan="2">Titulo:<br />
                <input name="nome" type="text" id="nome" style="border:1px solid #999; width:630px;" value="<?php echo $rsnoticia['nome']; ?>" size="101" maxlength="100"/></td>
            </tr>
             <tr>
              <td colspan="2"><br />Categoria:<br /><select name="idcategoria" id="idcategoria"> 
         <?php
			$sqlsegmento= $mySQL->runQuery("SELECT * FROM clt_categorias WHERE status='publicado'");
			while($row = mysql_fetch_assoc($sqlsegmento)) {
				$sqlcat_sub= $mySQL->runQuery("SELECT * FROM clt_produtos WHERE idproduto='".$_GET['id']."'");
	$rs_cat_sub = mysql_fetch_array($sqlcat_sub);	
	if($row['idcategoria']==$rs_cat_sub['idcategoria']){ $sl='selected="selected"';} else { $sl=''; }
		echo '<option value="'.$row['idcategoria'].'" '.$sl.'>'.$row['nome'].'</option>';
}
?> 
  </select>
            </tr>
            <tr>
              <td colspan="2"><br />
              Descri&ccedil;&atilde;o:<br />
                <div style="width:670px;">
                  <?php
				$oFCKeditor = new FCKeditor('descricao') ;
				$oFCKeditor->BasePath = '_js/fckeditor/' ;
				$oFCKeditor->Config['SkinPath'] = 'skins/silver/' ;
				$oFCKeditor->Value = $rsnoticia['descricao'];
				$oFCKeditor->Create() ;
			?>
                </div></td>
            </tr>
            
            <tr>
              <td colspan="2"><br />Imagem:<br />
                <?php if($rsnoticia['imagem']) { ?><img src="../_imgs/_produtos/<?php echo $rsnoticia['imagem']; ?>" alt="" width="70" height="56" border="0"/>
                <input name="imagem_delete" type="checkbox" id="imagem_delete" value="1" />
                <label for="imagem_delete"></label>
Apagar imagem<br /><?php } ?>
                <input name="imagem" type="file" id="imagem" style="border:1px solid #999; width:500px;" value="<?php echo $rsnoticia['titulo']; ?>" size="81" maxlength="100"/></td>
            </tr>
           
            <tr>
              <td colspan="2"><br />Mostrar:
                <input name="status" type="checkbox" id="status" <?php if($rsnoticia['status']=='publicado') { echo 'value="publicado" checked="checked"';} else { echo 'value="publicado"'; } ?>  />
                <label for="status"></label></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><input type="submit" name="alterar" id="alterar" value="Alterar" />
                <input type="submit" name="bnt_excluir" id="bnt_excluir" value="Lixeira" /></td>
            </tr>
          </table></td>
        <tr>
          <td height="5" colspan="2" align="center" bgcolor="#EFEFEF"></td>
        <tr>
         
        </table>
      <br />
      <br/>
</form>