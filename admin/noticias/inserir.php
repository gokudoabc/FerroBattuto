<br/><br/><br/>
<form action="noticias/action.php" method="post" enctype="multipart/form-data" name="form1" id="form1">      
      <table width="800" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td colspan="3"><h1><em>Adicionar Dica</em>
            <input name="opt" type="hidden" id="opt" value="inserir" />
          </h1></td>
          </tr>        
        <tr>
          <td height="5" colspan="2" align="left" bgcolor="#EFEFEF"></td>
          <td width="56%" rowspan="5" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="left" bgcolor="#EFEFEF"><table width="700" style="margin-left:20px;" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="2">Titulo:<br />
                <input name="titulo" type="text" id="titulo" style="border:1px solid #999; width:630px;" size="101" maxlength="100"/></td>
            </tr>
            <tr>
              <td colspan="2">Resumo:<br />
                <div style="width:630px;">
                <textarea name="resumo" id="resumo"  style="width:600px; height:80px; margin-bottom:20px;"><?php echo $rsnoticia['resumo']; ?></textarea>
                
                </div></td>
            </tr>
            <tr>
              <td colspan="2">Not&iacute;cia:<br />
                <div style="width:630px;">
                  <?php
				$oFCKeditor = new FCKeditor('artigo') ;
				$oFCKeditor->BasePath = '_js/fckeditor/' ;
				$oFCKeditor->Config['SkinPath'] = 'skins/silver/' ;
				$oFCKeditor->Value = $codigo['codigo'];
								$oFCKeditor->Height   = '450';

				$oFCKeditor->Create() ;
			?>
                </div></td>
            </tr>
            <tr>
              <td colspan="2">Imagem:<br />
                <input name="imagem" type="file" id="imagem" style="border:1px solid #999; width:500px;" value="" size="81" maxlength="100"/></td>
            </tr>
                <input name="ordem" type="hidden" id="ordem" size="5" value="<?php echo $rsnoticia['ordem']; ?>" autocomplete="off"/></td>
            <tr>
              <td colspan="2">Mostrar:
                <input name="status" type="checkbox" id="status" value="publicado"/>
                <label for="status"></label></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><input type="submit" name="inserir" id="inserir" value="Inserir" /></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="5" colspan="2" align="left" bgcolor="#EFEFEF"></td>
        </tr>            
      </table>
<br />
      <br/>
      </form>