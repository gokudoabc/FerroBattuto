<br/><br/><br/>
<form action="galeria/action.php" method="post" enctype="multipart/form-data" name="form1" id="form1">      
      <table width="800" border="0" cellspacing="0" cellpadding="4" align="left">
        <tr>
          <td colspan="3"><h1><em>Adicionar Imagem </em>
              <input name="opt" type="hidden" id="opt" value="inserir" />
                                      <input name="autor" type="hidden" id="autor" value=" Opa" />
                                      <input name="lingua" type="hidden" id="lingua" value="pt" />
          </h1></td>
        </tr>        
        <tr>
          <td height="5" colspan="2" align="left" bgcolor="#EFEFEF"></td>
          <td width="56%" rowspan="5" valign="top">
           </td>        
        <tr>
          <td colspan="2" align="left" bgcolor="#EFEFEF"><table style="margin-left:20px;" width="600" border="0" align="left" cellpadding="3" cellspacing="3">
            <tr>
              <td colspan="2">Titulo:<br />
                <input name="nome" type="text" id="nome" style="border:1px solid #999; " value="<?php echo $rsnoticia['nome']; ?>" size="70" maxlength="100"/></td>
            </tr>
            <tr>
              <td colspan="2"><br />Categoria:<br /><select name="idcategoria" id="idcategoria"> 
         <?php
			$sqlsegmento= $mySQL->runQuery("SELECT * FROM fer_categorias_galeria WHERE status='publicado'");
			while($row = mysql_fetch_assoc($sqlsegmento)) {
				$sqlcat_sub= $mySQL->runQuery("SELECT * FROM fer_galeria WHERE idgaleria='".$_GET['id']."'");
	$rs_cat_sub = mysql_fetch_array($sqlcat_sub);	
	if($row['idcategoria']==$rs_cat_sub['idcategoria']){ $sl='selected="selected"';} else { $sl=''; }
		echo '<option value="'.$row['idcategoria'].'" '.$sl.'>'.$row['nome'].'</option>';
}
?> 
  </select>
            </tr>
            <tr>
              <td colspan="2"><br />Imagem:<br />
               <?php if($rsnoticia['imagem']) { ?> <img src="../_imgs/_banner/<?php echo $rsnoticia['imagem']; ?>" alt="" width="120" height="60" border="0"/>
                <input name="imagem_delete" type="checkbox" id="imagem_delete" value="1" />
                <label for="imagem_delete"></label>
Apagar imagem<br /><?php } ?>
                <input name="imagem" type="file" id="imagem" style="border:1px solid #999;" value="<?php echo $rsnoticia['titulo']; ?>" size="70" maxlength="100"/></td>
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
              <td colspan="2"><input type="submit" name="inserir" id="inserir" value="Inserir" />
                <input type="submit" name="bnt_excluir" id="bnt_excluir" value="Lixeira" /></td>
            </tr>
          </table></td>
        <tr>
          <td height="5" colspan="2" align="left" bgcolor="#EFEFEF"></td>
        <tr>
         
        </table>
<br />
      <br/>
      </form>