<br/><br/><br/>
<form action="eventos/action.php" method="post" enctype="multipart/form-data" name="form1" id="form1">      
      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td colspan="3"><h1><em>Inserir Evento</em>
            <input name="opt" type="hidden" id="opt" value="inserir" />
          </h1></td>
          </tr>        
        <tr>
          <td height="5" colspan="2" align="center" bgcolor="#EFEFEF"></td>
          <td width="56%" rowspan="5" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="center" bgcolor="#EFEFEF"><table width="95%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="2">Titulo:<br />
                <input name="titulo" type="text" id="titulo" style="border:1px solid #999; width:630px;" size="101" maxlength="100"/></td>
            </tr>
                        <tr>
              <td colspan="2">Nome congresso:<br />
                <input name="nome_evento" type="text" id="nome_evento" style="border:1px solid #999; width:630px;" size="101" maxlength="100"/></td>
            </tr>
            
                
            <tr>
              <td colspan="2">Descrição:<br />
                <div style="width:630px;">
                  <?php
				$oFCKeditor = new FCKeditor('descricao') ;
				$oFCKeditor->BasePath = '_js/fckeditor/' ;
				$oFCKeditor->Config['SkinPath'] = 'skins/silver/' ;
				$oFCKeditor->Value = $codigo['codigo'];
				$oFCKeditor->Create() ;
			?>
                </div></td>
            </tr>
                                         <tr>
              <td colspan="2">Local:<br />
                <input name="local" type="text" id="local" style="border:1px solid #999; width:630px;" size="101" maxlength="100"/></td>
            </tr>
                                    <tr>
              <td colspan="2">Url:<br />
                <input name="url" type="text" id="url" style="border:1px solid #999; width:630px;" size="101" maxlength="100"/></td>
            </tr>
                                              <tr>
              <td colspan="2">Cidade:<br />
                <input name="cidade" type="text" id="cidade" style="border:1px solid #999; width:630px;" size="101" maxlength="100"/></td>
            </tr>
                                              <tr>
              <td colspan="2">Estado:<br />
                <input name="estado" type="text" id="estado" style="border:1px solid #999; width:630px;" size="101" maxlength="100"/></td>
            </tr>
<tr>
              <td colspan="2"><br />Imagem:<br />
                <?php if($rsnoticia['logo']) { ?><img src="../_img/_noticias/<?php echo $rsnoticia['logo']; ?>" alt="" width="70" height="56" border="0"/>
                <input name="imagem_delete" type="checkbox" id="imagem_delete" value="1" />
                <label for="imagem_delete"></label>
Apagar imagem<br /><?php } ?>
                <input name="imagem" type="file" id="imagem" style="border:1px solid #999; width:500px;" value="<?php echo $rsnoticia['titulo']; ?>" size="81" maxlength="100"/></td>
            </tr>
          <tr>
              <td colspan="2">Data inicio:<br />
			<input type="text" name="data_inicio" id="calendario" />   <br /> <br />           
            </tr>
                     <tr>
              <td colspan="2">Data termino:<br />
			<input type="text" name="data_final" id="calendario2" />             
            </tr>
            <tr>
              <td colspan="2"><br />Mostrar:
                <input name="status" type="checkbox" id="status" <?php if($rsnoticia['status']=='publicado') { echo 'value="publicado" checked="checked"';} else { echo 'value="publicado"'; } ?>  />
                <label for="status"></label></td>
            </tr>
          </table></td>
        </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>

        <tr>
          <td height="5" colspan="2" align="center" bgcolor="#EFEFEF"></td>
        </tr>            
      </table>
<br />
      <br/>
      </form>