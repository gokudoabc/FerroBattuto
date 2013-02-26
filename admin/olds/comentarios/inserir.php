<br/><br/><br/>
 <form action="aulas/action.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      	 <input name="opt" type="hidden" id="opt" value="inserir" />
      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td colspan="3"><h1><em>Inserir Aula médica - Profissionais de sa&uacute;de</em>
           
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
                <input name="titulo" type="text" id="titulo" style="border:1px solid #999; width:630px;" value="<?php echo $rsnoticia['titulo']; ?>" size="101" maxlength="100"/></td>
            </tr>
            <tr>
              <td colspan="2"><br />Descriação:<br />
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
              <td colspan="2"><br />Arquivo:<br />
            <a href="../_download/<?php echo $rsnoticia['arquivo']; ?>"> <?php echo $rsnoticia['arquivo']; ?></a><br />
                <?php if($rsnoticia['arquivo']) { ?>
                <input name="imagem_delete" type="checkbox" id="imagem_delete" value="1" />
                <label for="imagem_delete"></label>
Apagar arquivo<br /><?php } ?>
                <input name="arquivo" type="file" id="arquivo" style="border:1px solid #999; width:500px;" value="<?php echo $rsnoticia['titulo']; ?>" size="81" maxlength="100"/></td>
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
              <td colspan="2"><input type="submit" value="Inserir" />
                </td>
            </tr>
          </table></td>
        <tr>
          <td height="5" colspan="2" align="center" bgcolor="#EFEFEF"></td>
        <tr>
         
        </table>
      <br />
      <br/>
</form>