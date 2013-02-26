<br/><br/><br/>
<?php $sqlnoticia = $mySQL->runQuery("SELECT * FROM for_paginas WHERE idpagina='5'");
			$rsnoticia = mysql_fetch_array($sqlnoticia);

								
			?>
      <form action="produto/action.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      	 <input name="opt" type="hidden" id="opt" value="editar" />
            <input name="idpagina" type="hidden" id="idpagina" value="5" />
            <input name="img_old" type="hidden" id="img_old" value="<?php echo $rsnoticia['imagem']; ?>" />      

      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td colspan="3"><h1><em>Editar Produto</em>
           
          </h1></td>
        </tr>        
        <tr>
          <td height="5" colspan="2" align="center" bgcolor="#EFEFEF"></td>
          <td width="56%" rowspan="5" valign="top">
            <table width="200" border="0" cellspacing="3" cellpadding="3" style="background-color:#d8d8d8; margin-left:20px;">
             
          </table></td>        
        <tr>
          <td colspan="2" align="center" bgcolor="#EFEFEF"><table width="95%" border="0" align="center" cellpadding="3" cellspacing="3">

            <tr>
              <td colspan="2"><br />Pagina:<br />
                <div style="width:670px;">
                  <?php
				$oFCKeditor = new FCKeditor('pagina') ;
				$oFCKeditor->BasePath = '_js/fckeditor/' ;
				$oFCKeditor->Config['SkinPath'] = 'skins/silver/' ;
				$oFCKeditor->Value = $rsnoticia['pagina'];
				$oFCKeditor->Create() ;
			?>
                </div></td>
            </tr>



            <tr>
              <td colspan="2"><br />Mostrar:
                <input name="status" type="checkbox" id="status" <?php if($rsnoticia['status']==1) { echo 'value="1" checked="checked"';} else { echo 'value="1"'; } ?>  />
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