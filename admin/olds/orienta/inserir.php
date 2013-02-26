<br/><br/><br/>
<form action="orienta/action.php" method="post" enctype="multipart/form-data" name="form1" id="form1">      
      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td colspan="3"><h1><em>Inserir Forte Orienta</em>
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
              <td colspan="2">Titulo do menu / Categoria:                
                <br />                
                <select name="titulo_menu" id="titulo_menu">
                  <option value="">--- Selecione uma opção---</option>
                  <?php $sql_categoria = $mySQL->runQuery("SELECT idcategoria,categoria,status FROM forteap_categoria WHERE status='publicado'");
				  			while($rs_categoria = mysql_fetch_array($sql_categoria)) { ?>	
                   <option value="<?php echo $rs_categoria['idcategoria']; ?>"><?php echo $rs_categoria['categoria']; ?></option>
                   <?php } ?>                
              	</select>
             </td>
            </tr>
            <tr>
              <td colspan="2">Resumo:
                <div style="width:630px;">
                  <?php
				$oFCKeditor = new FCKeditor('resumo') ;
				$oFCKeditor->BasePath = '_js/fckeditor/' ;
				$oFCKeditor->Config['SkinPath'] = 'skins/silver/' ;
				$oFCKeditor->Value = $codigo['resumo'];
				$oFCKeditor->Height = '150';
				$oFCKeditor->Create() ;
			?>
              </div></td>
            </tr>
            <tr>
              <td colspan="2">Cont&eacute;udo:<br />
                <div style="width:630px;">
                  <?php
				$oFCKeditor = new FCKeditor('conteudo') ;
				$oFCKeditor->BasePath = '_js/fckeditor/' ;
				$oFCKeditor->Config['SkinPath'] = 'skins/silver/' ;
				$oFCKeditor->Value = $codigo['codigo'];
				$oFCKeditor->Height = '700';
				$oFCKeditor->Create() ;
			?>
                </div></td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2">Imagem:<br />
                <input name="imagem" type="file" id="imagem" style="border:1px solid #999; width:500px;" value="" size="81" maxlength="100"/></td>
            </tr>
            <tr>
              <td colspan="2">Ordem:
                <label for="ordem"></label>
                <input name="ordem" type="text" id="ordem" size="5" /></td>
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