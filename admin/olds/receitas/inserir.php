<br/><br/><br/>
<form action="receitas/action.php" method="post" enctype="multipart/form-data" name="form1" id="form1">      
      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td colspan="3"><h1><em>Inserir Receitas</em>
              <input name="opt" type="hidden" id="opt" value="inserir" />
                            <input name="autor" type="hidden" id="autor" value="<?php echo $_SESSION['nomeuser']; ?>" />

          </h1></td>
          </tr>        
        <tr>
          <td height="5" colspan="2" align="center" bgcolor="#EFEFEF"></td>
          <td width="56%" rowspan="5" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="center" bgcolor="#EFEFEF"><table width="95%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="2">Nome da receita:<br />
                <input name="titulo" type="text" id="titulo" style="border:1px solid #999; width:630px;" size="101" maxlength="100"/></td>
            </tr>
            <tr>
                      
            <tr>
              <td colspan="2">Resumo:<br />
                <div style="width:630px;">
                  <?php
				$oFCKeditor = new FCKeditor('resumo') ;
				$oFCKeditor->BasePath = '_js/fckeditor/' ;
				$oFCKeditor->Config['SkinPath'] = 'skins/silver/' ;
				$oFCKeditor->Value = $codigo['codigo'];
				$oFCKeditor->Height = '200';
				$oFCKeditor->Create() ;
			?>
                </div></td>
            </tr>
                        <tr>
              <td colspan="2">Cont&eacute;udo:<br />
                <div style="width:630px;">
                  <?php
				$oFCKeditor = new FCKeditor('ingrediente') ;
				$oFCKeditor->BasePath = '_js/fckeditor/' ;
				$oFCKeditor->Config['SkinPath'] = 'skins/silver/' ;
				$oFCKeditor->Value = $codigo['codigo'];
				$oFCKeditor->Height = '200';
				$oFCKeditor->Create() ;
			?>
                </div></td>
            </tr>
                                    <tr>
              <td colspan="2">Modo de preparo:<br />
                <div style="width:630px;">
                  <?php
				$oFCKeditor = new FCKeditor('conteudo') ;
				$oFCKeditor->BasePath = '_js/fckeditor/' ;
				$oFCKeditor->Config['SkinPath'] = 'skins/silver/' ;
				$oFCKeditor->Value = $codigo['codigo'];
				$oFCKeditor->Height = '200';
				$oFCKeditor->Create() ;
			?>
                </div></td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <input name="imagem" type="hidden" id="imagem" style="border:1px solid #999; width:500px;" value="" size="81" maxlength="100"/></td>
            </tr>
            <tr>
              <td colspan="2">Ordem:
                <label for="ordem"></label>
                <input name="ordem" type="text" id="ordem" size="5" autocomplete="off" /></td>
            </tr>
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
          <td height="5" colspan="2" align="center" bgcolor="#EFEFEF"></td>
        </tr>            
      </table>
<br />
      <br/>
      </form>