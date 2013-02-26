<br/><br/><br/>
<?php $sqlnoticia = $mySQL->runQuery("SELECT * FROM  neo_comentarios WHERE idcoment='".$_GET['id']."'");
			$rsnoticia = mysql_fetch_array($sqlnoticia);
															?>
      <form action="comentarios/action.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      	 <input name="opt" type="hidden" id="opt" value="editar" />
            <input name="idcoment" type="hidden" id="idcoment" value="<?php echo $rsnoticia['idcoment']; ?>" />
            <input name="img_old" type="hidden" id="img_old" value="<?php echo $rsnoticia['imagem']; ?>" />      
      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td colspan="3"><h1><em>Editar Comentarios - Profissionais de sa&uacute;de</em>
           
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
                <input name="titulo" type="text" id="titulo" style="border:1px solid #999; width:200px;" value="<?php echo $rsnoticia['titulo']; ?>" size="101" maxlength="100"/></td>
            </tr>
                        <tr>
              <td colspan="2">Médico:<br />
                <input name="medico" type="text" id="medico" style="border:1px solid #999; width:200px;" value="<?php echo $rsnoticia['medico']; ?>" size="101" maxlength="100"/></td>
            </tr>

            <tr>
              <td colspan="2"><br />Comentario:<br />
                <div style="width:670px;">
                  <?php
				$oFCKeditor = new FCKeditor('comentario') ;
				$oFCKeditor->BasePath = '_js/fckeditor/' ;
				$oFCKeditor->Config['SkinPath'] = 'skins/silver/' ;
				$oFCKeditor->Value = $rsnoticia['comentario'];
				$oFCKeditor->Create() ;
			?>
                </div></td>
            </tr>
                   
            <tr>
              <td colspan="2"><br />Imagem:<br />
            <a href="../_img/_forum/<?php echo $rsnoticia['imagem']; ?>"> <?php echo $rsnoticia['imagem']; ?></a><br />
                <?php if($rsnoticia['imagem']) { ?>
                <input name="imagem_delete" type="checkbox" id="imagem_delete" value="1" />
                <label for="imagem_delete"></label>
Apagar arquivo<br /><?php } ?>
                <input name="imagem" type="file" id="imagem" style="border:1px solid #999; width:500px;" value="<?php echo $rsnoticia['imagem']; ?>" size="81" maxlength="100"/></td>
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